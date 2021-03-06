<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    const QST = 0.09975;
    const GST = 0.05;

    /**
     * Authenticate if user is logged in.
     * Else load orders.
     *
     * @return redirect to orders
     */
    public function index(Request $request)
    {
        //Check credentials
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        $orders = Order::select('id', 'user_id', 'total', 'credit_card' , 'created_at')
                        ->where('user_id', Auth::user()->id)
                        ->orderBy('user_id','Desc')
                        ->paginate(10);

        return view('pages.orders', [
            'orders' => $orders,
            'clearCart' => $request->query('clearCart')
        ]);
    }
    
    /**
     * Authenticate if user is logged in.
     * Else process order.
     *
     * @return redirect
     */
    public function store(Request $request)
    {
        
        //Check credentials
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        // Validate
        $this->validate($request,
        [
            'credit_card' => 'required',
            'cart-data' => 'required'
        ]);

        //Pull data from request
        $userId = Auth::id();
        $creditCard = $request->credit_card;
        $price = $this->getPrice($request);

        if ($price <= 0)
            return redirect()->route('cart');

        //Write to DB
        DB::transaction(function () use ($userId, $price, $creditCard, $request) {
            $createdOrder = Order::create([
                'user_id' => $userId,
                'total' => $price,
                'credit_card' => $creditCard
            ]);

            $orderItems = $this->getOrderItems($request, $createdOrder->id);

            OrderItem::insert($orderItems);
        });

        //Return view
        return redirect()->route('orders', ['clearCart' => true]);
        
    }

    /**
     * Calculate total price with taxes based on cart data
     * 
     * @return totalPrice
     */
    private function getPrice(Request $request)
    {
        $cartData = collect(json_decode($request->get('cart-data')));

        $price = Product::query()
            ->select('id', 'price')
            ->whereIn('id', $cartData->pluck('id'))
            ->cursor()
            ->reduce(function ($accumulated, $product) use ($cartData) {
                return $accumulated + ($product->price * $cartData->firstWhere('id', $product->id)->amount);
            }, 0);

        $price += $price*self::QST + $price*self::GST;
        
        return number_format((float)$price, 2, '.', '');
    }

    /**
     * Prepares array of items associated to a specific order
     * 
     * @return item array
     */
    private function getOrderItems(Request $request, $orderId)
    {
        $cartItems = json_decode($request->get('cart-data'), true);

        $orderItems = array();
        foreach ($cartItems as $item)
        {
            if ($item['amount'] <= 0)
                continue;

            $arrItem = array(
                'order_id' => $orderId,
                'product_id' => $item['id'],
                'amount' => $item['amount'],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            );
            
            array_push($orderItems, $arrItem);
        }

        return $orderItems;
    }
    
    /**
     * Generates order details
     *
     * @return order details
     */
    public function orderDetails(Request $request, $id)
    {
        //Check credentials
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        $orderDetails = Product::join('order_items', 'products.id', '=', 'order_items.product_id')
                                ->join('orders', 'order_items.order_id', '=', 'orders.id')
                                ->where('orders.id', $id)
                                ->select('products.*', 'order_items.amount')
                                ->get();

        return view('pages.ordersitems', [
            'orders' => $orderDetails,
            'clearCart' => $request->query('Product')
        ]);
    }

    /**
     * Generate product details.
     *
     * @return product details
     */
    public function productDetails(Request $request, $id)
    {
        //Check credentials
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        $id = $request->route('product_id');

        $productDetails = Product::select('id', 'name', 'category', 'subcategory', 'price', 'about', 'details', 'weight', 'image')
        ->where('id', $id)->firstorFail();

        $userCanAddToCart = false;

        return view('pages.productpage', [
            'product' => $productDetails,
            'userCanAddToCart' => $userCanAddToCart
        ]);

    }

    /**
     * Delete an order
     *
     * @return redirect to orders
     */
    public function deleteOrder(Request $request)
    {
        //Check credentials
        if ($redirect = parent::redirectOnNotUser($request))
        {
            return $redirect;
        }

        $id = $request->get('order_id');

        OrderItem::where('order_id', $id)->delete();
        Order::where('id', $id)->delete();
        
        return redirect(route('orders'));
    }
    
}
