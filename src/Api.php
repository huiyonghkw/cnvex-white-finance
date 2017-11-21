<?php 

namespace Bravist\CnvexWhiteFinance;

use Bravist\CnvexWhiteFinance\Request;

class Api extends Request
{
    public function supportWhiteFinance($idCardNumber, $idCardType = '身份证')
    {
        return $this->send('get', 'openapi/wpiousv01/creditAccount', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }

    public function subscribeWhiteFinance($idCardNumber, $idCardType = '身份证')
    {
        return $this->send('post', 'openapi/wpiousv01/open', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }

    public function checkWhiteFinance($idCardNumber, $idCardType = '身份证')
    {
        return $this->send('get', 'openapi/wpiousv01/creditAccount', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }

    public function createWhiteFinance($idCardNumber, $serialNumber, $amount, $idCardType = '身份证')
    {
        return $this->send('post', 'openapi/wpiousv01/lockCreditQuota', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber,
            'serialNumber' => $serialNumber,
            'amount' => $amount
        ]);
    }

    public function executeWhiteFinance($idCardNumber, $serialNumber, $amount, $factAmount, $idCardType = '身份证')
    {
        return $this->send('post', 'openapi/wpiousv01/useCreditQuota', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber,
            'serialNumber' => $serialNumber,
            'amount' => $amount,
            'factAmount' => $factAmount
        ]);
    }

    public function queryWhiteFinance($idCardNumber, $idCardType = '身份证')
    {
        return $this->send('get', 'openapi/wpiousv01/queryIousLoanAccount', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }
}
