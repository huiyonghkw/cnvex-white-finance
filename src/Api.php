<?php 

namespace Bravist\CnvexWhiteFinance;

use Bravist\CnvexWhiteFinance\Request;

class Api extends Request
{
    public function supportWhiteFinance($idCardNumber, $idCardType = '统一社会信用代码')
    {
        return $this->send('get', 'openapi/wpiousv01/creditAccount', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }

    public function subscribeWhiteFinance($idCardNumber, $clientName = '七七', $idCardType = '统一社会信用代码')
    {
        return $this->send('post', 'openapi/wpiousv01/open', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber,
            'clientName' => $clientName
        ]);
    }

    public function checkWhiteFinance($idCardNumber, $idCardType = '统一社会信用代码')
    {
        return $this->send('get', 'openapi/wpiousv01/creditAccount', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }

    public function createWhiteFinance($idCardNumber, $orderNo, $amount, $idCardType = '统一社会信用代码')
    {
        return $this->send('post', 'openapi/wpiousv01/lockCreditQuota', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber,
            'orderNo' => $orderNo,
            'amount' => $amount
        ]);
    }

    public function executeWhiteFinance($idCardNumber, $orderNo, $amount, $factAmount, $idCardType = '统一社会信用代码')
    {
        return $this->send('post', 'openapi/wpiousv01/useCreditQuota', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber,
            'orderNo' => $orderNo,
            'amount' => $amount,
            'factAmount' => $factAmount
        ]);
    }

    public function queryWhiteFinance($idCardNumber, $idCardType = '统一社会信用代码')
    {
        return $this->send('get', 'openapi/wpiousv01/queryIousLoanAccount', [
            'idCardType' => $idCardType,
            'idCardNumber' => $idCardNumber
        ]);
    }
    
}
