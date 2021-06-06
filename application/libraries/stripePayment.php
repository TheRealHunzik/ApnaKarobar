<?php if(!DEFINED('BASEPATH')) exit('No Direct Access To script Allow');

include("./vendor/autoload.php");
class stripePayment
{
    public function __construct()
    {
        $this->CI =& get_instance();
        $stripe = array(
            "secret_key" => "sk_test_VzDAWutG1A6IfRg7yzrEmWbu",
            "public_key" => "pk_test_s4c9RmKSo24pMDvtkWnhjwjZ"

        );
        Stripe\Stripe::setApiKey($stripe["secret_key"]);
    }
    public function checkout($data){
        $message = "";
        try{
            $mycard = array('number' => $data['number'],
                            'exp_month' => $data['exp_month'],
                            'exp_year' => $data['exp_year']);
            $charge = \Stripe\Charge::create(array('card'=>$mycard,
                                                    'amount'=>$data['amount'],
                                                    'currency'=>'usd'));
            $message = $charge->status;											
        }catch (Exception $e){
            $message = $e->getMessage();
        }	
        return $message;
        
    }
}
