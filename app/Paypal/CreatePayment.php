<?php


namespace App\Paypal;


use PayPal\Api\Amount;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payment;
use PayPal\Api\Transaction;

class CreatePayment extends Paypal
{

    public function create($price,$description){

        $payer = $this->getNewPayer();
        $item1 = $this->getItem($price, $description);

        $itemList = $this->listItem($item1);
        $amount = $this->getAmount($price);

        $transaction = $this->getTransaction($description, $amount, $itemList);

        $redirectUrls = $this->getRedirectUrls();

        $payment = $this->getPayment($payer, $redirectUrls, $transaction);
        $request = clone $payment;

        $payment->create($this->_api_context);

        $approvalUrl = $payment->getApprovalLink();
        return redirect($approvalUrl);
    }

    /**
     * @return \PayPal\Api\Payer
     */
    public function getNewPayer(): \PayPal\Api\Payer
    {
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');
        return $payer;
    }

    /**
     * @param $price
     * @param $description
     * @return Item
     */
    public function getItem($price, $description): Item
    {
        $item1 = new Item();
        $item1->setName($description)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice($price);
        return $item1;
    }

    /**
     * @param Item $item1
     * @return ItemList
     */
    public function listItem(Item $item1): ItemList
    {
        $itemList = new ItemList();
        $itemList->setItems(array($item1));
        return $itemList;
    }

    /**
     * @param $price
     * @return Amount
     */
    public function getAmount($price): Amount
    {
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($price);
        return $amount;
    }

    /**
     * @param $description
     * @param Amount $amount
     * @param ItemList $itemList
     * @return Transaction
     */
    public function getTransaction($description, Amount $amount, ItemList $itemList): Transaction
    {
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription($description)
            ->setInvoiceNumber(uniqid());
        return $transaction;
    }

    /**
     * @return \PayPal\Api\RedirectUrls
     */
    public function getRedirectUrls(): \PayPal\Api\RedirectUrls
    {
        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl((route("execute-payment")))
            ->setCancelUrl((url("cancel-payment")));
        return $redirectUrls;
    }

    /**
     * @param \PayPal\Api\Payer $payer
     * @param \PayPal\Api\RedirectUrls $redirectUrls
     * @param Transaction $transaction
     * @return Payment
     */
    public function getPayment(\PayPal\Api\Payer $payer, \PayPal\Api\RedirectUrls $redirectUrls, Transaction $transaction): Payment
    {
        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));
        return $payment;
    }

}
