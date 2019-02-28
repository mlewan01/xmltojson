<?php
$xml = getData("data.xml");

$au = xml2json($xml);

echo "{"; echo $au[1]; echo "}";

function getData($data){
    $stream = '
<priip>
<data>
    <product>
        <priipCloudProductTemplate>otc</priipCloudProductTemplate>
        <priipCloudProductType>fxSwap</priipCloudProductType>
        <productIdentifier>RBI_fxSwap_EURUSD_long_1Y2D_EUR</productIdentifier>
    </product>
    <manufacturer>
        <id>rbi</id>
        <nameLong>Raiffeisen Bank International AG</nameLong>
        <nameShort>RBI</nameShort>
        <address>Am Stadtpark 9, 1030 Wien, Austria</address>
        <telephoneNumber>+43 1 71707 0</telephoneNumber>
        <website>http://www.rbinternational.com</website>
        <email>complaints@rbinternational.com</email>
    </manufacturer>
    <document>
        <type>final</type>
    </document>
    <properties>
        <includeEarlyRedemptionInExtraordinaryEventsAlert>true</includeEarlyRedemptionInExtraordinaryEventsAlert>
    </properties>
    <tradeDate>2018-01-18</tradeDate>
    <effectiveDate>2018-01-20</effectiveDate>
    <fxSwap>
        <holder>client</holder><currencyPair>EURUSD</currencyPair>
        <notionalAmount>1000000</notionalAmount>
        <notionalAmountCurrency>EUR</notionalAmountCurrency>
        <terminationDate>2019-01-20</terminationDate>
        <forwardRate>
            <value>1.25620</value>
        </forwardRate>
        <spotRate>
            <value>1.2207</value>
        </spotRate>
    </fxSwap>
    <costs>
        <entryCosts>0.0025</entryCosts>
    </costs>
    <riskMeasures version="v1.0">
        <sriRelatedValues>
            <valueAtRisk>0</valueAtRisk>
            <valueAtRiskEquivalentVolatility>0</valueAtRiskEquivalentVolatility>
            <mrm>7</mrm>
            <crm>2</crm>
            <sri>7</sri>
        </sriRelatedValues>
        <performanceScenariosRelatedValues>
            <positiveScenarioPayoutRHP>11139.633068665</positiveScenarioPayoutRHP>
            <positiveScenarioActualReturnRHP>0.1139633069</positiveScenarioActualReturnRHP>
            <positiveScenarioAverageReturnPerYearRHP>0.114276</positiveScenarioAverageReturnPerYearRHP>
            <positiveScenarioPayoutIHP1>null</positiveScenarioPayoutIHP1>
            <positiveScenarioActualReturnIHP1>null</positiveScenarioActualReturnIHP1>
            <positiveScenarioAverageReturnPerYearIHP1>null</positiveScenarioAverageReturnPerYearIHP1>
            <positiveScenarioPayoutIHP2>null</positiveScenarioPayoutIHP2>
            <positiveScenarioActualReturnIHP2>null</positiveScenarioActualReturnIHP2>
            <positiveScenarioAverageReturnPerYearIHP2>null</positiveScenarioAverageReturnPerYearIHP2>
            <moderateScenarioPayoutRHP>9984.9790016645</moderateScenarioPayoutRHP>
            <moderateScenarioActualReturnRHP>-0.0015020998</moderateScenarioActualReturnRHP>
            <moderateScenarioAverageReturnPerYearRHP>-0.00150623</moderateScenarioAverageReturnPerYearRHP>
            <moderateScenarioPayoutIHP1>null</moderateScenarioPayoutIHP1>
            <moderateScenarioActualReturnIHP1>null</moderateScenarioActualReturnIHP1>
            <moderateScenarioAverageReturnPerYearIHP1>null</moderateScenarioAverageReturnPerYearIHP1>
            <moderateScenarioPayoutIHP2>null</moderateScenarioPayoutIHP2>
            <moderateScenarioActualReturnIHP2>null</moderateScenarioActualReturnIHP2>
            <moderateScenarioAverageReturnPerYearIHP2>null</moderateScenarioAverageReturnPerYearIHP2>
            <negativeScenarioPayoutRHP>8955.6992819847</negativeScenarioPayoutRHP>
            <negativeScenarioActualReturnRHP>-0.1044300718</negativeScenarioActualReturnRHP>
            <negativeScenarioAverageReturnPerYearRHP>-0.104717</negativeScenarioAverageReturnPerYearRHP>
            <negativeScenarioPayoutIHP1>null</negativeScenarioPayoutIHP1>
            <negativeScenarioActualReturnIHP1>null</negativeScenarioActualReturnIHP1>
            <negativeScenarioAverageReturnPerYearIHP1>null</negativeScenarioAverageReturnPerYearIHP1>
            <negativeScenarioPayoutIHP2>null</negativeScenarioPayoutIHP2>
            <negativeScenarioActualReturnIHP2>null</negativeScenarioActualReturnIHP2>
            <negativeScenarioAverageReturnPerYearIHP2>null</negativeScenarioAverageReturnPerYearIHP2>
            <stressScenarioPayoutRHP>6841.9699464563</stressScenarioPayoutRHP>
            <stressScenarioActualReturnRHP>-0.3158030054</stressScenarioActualReturnRHP>
            <stressScenarioAverageReturnPerYearRHP>-0.316671</stressScenarioAverageReturnPerYearRHP>
            <stressScenarioPayoutIHP1>null</stressScenarioPayoutIHP1>
            <stressScenarioActualReturnIHP1>null</stressScenarioActualReturnIHP1>
            <stressScenarioAverageReturnPerYearIHP1>null</stressScenarioAverageReturnPerYearIHP1>
            <stressScenarioPayoutIHP2>null</stressScenarioPayoutIHP2>
            <stressScenarioActualReturnIHP2>null</stressScenarioActualReturnIHP2>
            <stressScenarioAverageReturnPerYearIHP2>null</stressScenarioAverageReturnPerYearIHP2>
        </performanceScenariosRelatedValues>
    </riskMeasures>
    <costOutputs>
        <costsOverTime>
            <totalCostsRHP>
                <value>24.4219183409</value>
            </totalCostsRHP>
            <totalCostsIHP1>
                <value>null</value>
            </totalCostsIHP1>
            <totalCostsIHP2>
                <value>null</value>
            </totalCostsIHP2><reductionInActualYieldRHP>
            <value>0.0024421918</value>
        </reductionInActualYieldRHP>
            <reductionInActualYieldIHP1>
                <value>null</value>
            </reductionInActualYieldIHP1>
            <reductionInActualYieldIHP2>
                <value>null</value>
            </reductionInActualYieldIHP2>
            <reductionInYieldRHP>
                <value>0.0024489008</value>
            </reductionInYieldRHP>
            <reductionInYieldIHP1>
                <value>null</value>
            </reductionInYieldIHP1>
            <reductionInYieldIHP2>
                <value>null</value>
            </reductionInYieldIHP2>
        </costsOverTime>
        <compositionOfCosts>
            <actualEntryCosts>
                <value>0.0024421918</value>
            </actualEntryCosts>
            <actualOtherRecurringCostsPA>
                <value>null</value>
            </actualOtherRecurringCostsPA>
            <actualExitCosts>
                <value>0</value>
            </actualExitCosts>
            <entryCosts>
                <value>0.0024489008</value>
            </entryCosts>
            <otherRecurringCostsPA>
                <value>null</value>
            </otherRecurringCostsPA>
            <exitCosts>
                <value>0</value>
            </exitCosts>
        </compositionOfCosts>
    </costOutputs>
</data>
</priip>
    ';

    $stream = trim(preg_replace('/(\>)\s*(\<)/m', '$1$2', $stream));

    $xml  = new SimpleXmlIterator($stream);
    return $xml;
}

function xml2json($xml, $cc=0, $ss=0){
    $out='';     $xmlarr = array();
    $child_count = 0;
    $current = $xml->getName();
    $out .= "\"$current\"";
    $children = $xml->count();
//    echo "$children-$cc-$ss"; // helpful test
    $out .= ":";
    if($children > 0){
        $out .= "{";
    }
    foreach($xml as $key=>$val){ // walking the children
        $child_count++;
        if($val->attributes()[0] != NULL){  // check for attributes presence
            foreach($val->attributes() as $k2=>$v2){
                $val->addChild("@$k2", $v2); // adding attributes to current xml node( so it can be later retrived and printed in "@node:value" format
            }
        }
        $xmlarr = xml2json($val, $child_count,$children);
        $out .= $xmlarr[1];
        if($xmlarr[0] == 0){ // recursive call the the fu
            $out .= "\"$val\"";
//            echo "<b>\"$val\"</b>$children-$cc-$ss"; // helpful test
        }
        if($children - $child_count > 0){
            $out .= ", ";
        }
    }
    if($children > 0){
        $out .= "}";
    }
    return array($child_count, $out);
}
?>