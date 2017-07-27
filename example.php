<?php

include 'src/Cielo/API30/Environment.php';
include 'src/Cielo/API30/Merchant.php';
include 'src/Cielo/API30/Ecommerce/CieloSerializable.php';
include 'src/Cielo/API30/Ecommerce/Address.php';
include 'src/Cielo/API30/Ecommerce/CieloEcommerce.php';
include 'src/Cielo/API30/Ecommerce/CreditCard.php';
include 'src/Cielo/API30/Ecommerce/Customer.php';
include 'src/Cielo/API30/Ecommerce/Environment.php';
include 'src/Cielo/API30/Ecommerce/Payment.php';
include 'src/Cielo/API30/Ecommerce/RecurrentPayment.php';
include 'src/Cielo/API30/Ecommerce/Sale.php';
include 'src/Cielo/API30/Ecommerce/Request/CieloRequestException.php';
include 'src/Cielo/API30/Ecommerce/Request/AbstractSaleRequest.php';
include 'src/Cielo/API30/Ecommerce/Request/CieloError.php';
include 'src/Cielo/API30/Ecommerce/Request/CreateSaleRequest.php';
include 'src/Cielo/API30/Ecommerce/Request/QueryRecurrentPaymentRequest.php';
include 'src/Cielo/API30/Ecommerce/Request/QuerySaleRequest.php';
include 'src/Cielo/API30/Ecommerce/Request/UpdateSaleRequest.php';
   
include 'src/Cielo/API30/Ecommerce/Browser.php';
include 'src/Cielo/API30/Ecommerce/Cart.php';
include 'src/Cielo/API30/Ecommerce/FraudAnalysis.php';
include 'src/Cielo/API30/Ecommerce/Items.php';
include 'src/Cielo/API30/Ecommerce/Legs.php';
include 'src/Cielo/API30/Ecommerce/MerchantDefinedFields.php';
include 'src/Cielo/API30/Ecommerce/Passenger.php';
include 'src/Cielo/API30/Ecommerce/Shipping.php';
include 'src/Cielo/API30/Ecommerce/Travel.php';
include 'src/Cielo/API30/Ecommerce/ReplyData.php';

use Cielo\API30\Merchant;
use Cielo\API30\Ecommerce\Address;
use Cielo\API30\Ecommerce\CieloEcommerce;
use Cielo\API30\Ecommerce\CreditCard;
use Cielo\API30\Ecommerce\Customer;
use Cielo\API30\Ecommerce\Environment;
use Cielo\API30\Ecommerce\Payment;
use Cielo\API30\Ecommerce\Sale;
use Cielo\API30\Ecommerce\Request\CieloRequestException;

use Cielo\API30\Ecommerce\FraudAnalysis;
use Cielo\API30\Ecommerce\Browser;
use Cielo\API30\Ecommerce\Cart;
use Cielo\API30\Ecommerce\Items;
use Cielo\API30\Ecommerce\Legs;
use Cielo\API30\Ecommerce\MerchantDefinedFields;
use Cielo\API30\Ecommerce\Passenger;
use Cielo\API30\Ecommerce\Shipping;
use Cielo\API30\Ecommerce\Travel;
use Cielo\API30\Ecommerce\ReplyData;

$environment = Environment::sandbox();

$merchant = new Merchant('7c9a2c00-3ba0-4bea-a228-5ca0d893830f', 'ACJABNUESHMUHBXNAGBOVMPWHSPKBOWILXSSCOLF');

$address = new Address();
$address
    ->setCity('Rio de Janeiro')
    ->setComplement('Apto 418')
    ->setCountry('BRA')
    ->setNumber(160)
    ->setState('RJ')
    ->setStreet('Avenida Marechal Câmara')
    ->setZipCode('22750012')
    ->setDistrict('Centro')
;

$customer = new Customer();
$customer
    ->setName('Fulano Test')
    ->setEmail('fulano@test.com.br')
    ->setBirthDate('1998-11-07')
    ->setIdentity('100200300400-10')
    ->setIdentityType('CPF')
    ->setAddress($address)
    ->setDeliveryAddress($address)
;

$creditCard = new CreditCard();
$creditCard
    ->setBrand('Visa')//(Visa / Master / Amex / Elo / Aura / JCB / Diners / Discover)
    ->setCardNumber('0000000000000001')
    ->setExpirationDate('12/2018')
    ->setHolder('Fulano Test')
    ->setSaveCard(false)
    ->setSecurityCode('123')
;

$payment = new Payment();
$payment
    ->setType(Payment::PAYMENTTYPE_CREDITCARD)
    ->setAmount(15700)
    ->setInstallments(3)
    ->setCapture(false)
    ->setCurrency('BRL')
    ->setCountry('BRA')
    ->setCreditCard($creditCard)
    ->setAddress($address)
;

//Analise de Fraude
$passenger = new Passenger();
$passenger
    ->setEmail('compradorteste@live.com')
    ->setIdentity('1234567890')
    ->setName('Fulano Test')
    ->setPhone('99999444')
    ->setRating(Passenger::RATING_ADULT)
    ->setStatus('Accepted')
;

$items = new Items();
$items
    ->setGiftCategory(Items::YES)
    ->setHostHedge(Items::OFF)
    ->setName('Item Test')
    ->setNonSensicalHedge(Items::OFF)
    ->setObscenitiesHedge(Items::OFF)
    ->setPhoneHedge(Items::OFF)
    ->setQuantity(1)
    ->setRisk(Items::HIGH)
    ->setSku('581329-421-fv')
    ->setTimeHedge(Items::NORMAL)
    ->setType(Items::TYPE_PRIVATE_BUYER)
    ->setUnitPrice(123)
    ->setVelocityHedge(Items::HIGH)
    ->setPassenger($passenger)
;

$cart = new Cart();
$cart
    ->setIsGift(false)
    ->setReturnsAccepted(true)
    ->setItems($items)
;

$legs = new Legs();
$legs
    ->setDestination('GYN')
    ->setOrigin('VCP')
;

$travel = new Travel();
$travel
    ->setDepartureTime('2010-01-02')
    ->setJourneyType('Ida')
    ->setRoute('MACO-RJO')
    ->setLegs($legs)
;

$browser = new Browser();
$browser
    ->setEmail('fulano@test.com.br')
    ->setCookiesAccepted(false)
    ->setHostName('Test')
    ->setIpAddress('000.00.00.000')
    ->setType(Browser::TYPE_CHROME)
;

$merchantDefinedFields = new MerchantDefinedFields();
$merchantDefinedFields
    ->setId(95)
    ->setValue('Eu defini isso')
;

$shipping = new Shipping();
$shipping
    ->setAddressee('Sr Comprador Teste')
    ->setMethod(Shipping::METHOD_LOW_COST)
    ->setPhone('999994444')
;

$fraudAnalysis = new FraudAnalysis();
$fraudAnalysis
    ->setSequence(FraudAnalysis::SEQUENCE_AUTHORIZE_FIRST)
    ->setSequenceCriteria(FraudAnalysis::SEQUENCE_CRITERIA_ALWAYS)
    ->setFingerPrintId('074c1ee676ed4998ab66491013c565e2')
    ->setCart($cart)
    ->setTravel($travel)
    ->setShipping($shipping)
    ->setMerchantDefinedFields($merchantDefinedFields)
    ->setBrowser($browser)
;

$sale = new Sale();//Order Id
$sale
    ->setMerchantOrderId('5170247021')
    ->setPayment($payment)
    ->setCustomer($customer)
    ->setFraudAnalysis($fraudAnalysis)
;

// Configure o SDK com seu merchant e o ambiente apropriado para criar a venda
$sale = (new CieloEcommerce($merchant, $environment))->createSale($sale);

echo '<pre>';
print_r($sale->getFraudAnalysis()->getReplyData());
exit('--');

// Com a venda criada na Cielo, já temos o ID do pagamento, TID e demais
// dados retornados pela Cielo
$paymentId = $sale->getPayment()->getPaymentId();


// Com o ID do pagamento, podemos fazer sua captura, se ela não tiver sido capturada ainda
$sale = (new CieloEcommerce($merchant, $environment))->captureSale($paymentId, 15700, 0);


// E também podemos fazer seu cancelamento, se for o caso
$sale = (new CieloEcommerce($merchant, $environment))->cancelSale($paymentId, 15700);

