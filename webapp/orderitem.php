<?php
// this is the orderitem class which holds a ticket / order item	

class Orderitem implements JsonSerializable
{
    public $orderID; //id number of the order
    public $ordertype; //type of order (web, SEO, Graphic design)
    public $ordermessage; //order message / special instructions
    public $budget; //order budget
    

    public function __construct($orderID, $ordertype, $ordermessage, $budget) 
    {
    $this->orderID = (int)$orderID; //the order id
    $this->ordertype = $ordertype; //the order type
    $this->ordermessage = $ordermessage; //the order message
    $this->budget = (int)$budget; //the butdget
    }

    public function get_orderID(){
        return $this->orderID;
    }
    
    public function get_ordertype(){
        return $this->ordertype;
    }

    public function get_ordermessage(){
        return $this->ordermessage;
    }

    public function get_budget(){
        return $this->budget;
    }

    public function set_ordertype($ordertype){
        $this->ordertype = $ordertype;
    }

    public function set_ordermessage($ordermessage){
        $this->ordermessage->$ordermessage;
    }
    
    public function set_order_budget($budget){
        $this->budget = $budget;                               
    }

    function toListOrder(){ //tostring method to return order details

        return "<li>$this->orderID $this->ordertype $this->ordermessage $this->budget</li>";
    }
	
	  public function jsonSerialize()
    {
        return  get_object_vars($this);
    }
}

?>