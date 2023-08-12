<?php
declare(strict_types=1);

namespace App\Pay\Epusdt\Impl;

/**
 * Class Signature
 * @package App\Pay\Kvmpay\Impl
 */
class Signature implements \App\Pay\Signature
{

    /**
     * 生成签名
     * @param array $data
     * @param string $key
     * @return string
     */
//    public static function generateSignature(array $data, string $key): string
//    {
//        ksort($data);
//        $sign = '';
//        foreach ($data as $k => $v) {
//            $sign .= $k . '=' . $v . '&';
//        }
//        $sign = trim($sign, '&');
//        return md5($sign . $key);
//    }
    public static function generateSignature(array $parameter, string $signKey)
    {
        ksort($parameter);
        reset($parameter);
        $sign = '';
        foreach ($parameter as $key => $val) {
            if ($val == '') continue;
            if ($key != 'signature') {
                if ($sign != '') {
                    $sign .= "&";
                }
                $sign .= "$key=$val";
            }
        }
        $sign = md5($sign.$signKey);
        return $sign;
    }

    /**
     * @inheritDoc
     */
    public function verification(array $data, array $config): bool
    {
        $sign = $data['signature'];
        unset($data['signature']);
        $generateSignature = self::generateSignature($data, $config['key']);
        if ($sign != $generateSignature) {
            return false;
        }
        return true;
    }
}