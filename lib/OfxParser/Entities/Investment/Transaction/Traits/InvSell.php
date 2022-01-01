<?php

namespace OfxParser\Entities\Investment\Transaction\Traits;

use SimpleXMLElement;

use OfxParser\Entities\LoaderTrait;
use OfxParser\Entities\Investment\Transaction\Traits\InvTran;
use OfxParser\Entities\Investment\Transaction\Traits\SecId;
use OfxParser\Entities\Investment\Transaction\Traits\Pricing;

/**
 * OFX 203 doc:
 * 13.9.2.4.3 Investment Buy/Sell Aggregates <INVBUY>/<INVSELL>
 *
 * Properties found in the <INVSELL> aggregate.
 * Used for "other securities" SELL activities and provides the 
 * base properties to extend for more specific activities.
 *
 * Required:
 * <INVTRAN> aggregate
 * <SECID> aggregate
 * <UNITS>
 * <UNITPRICE>
 * <TOTAL>
 * <SUBACCTSEC>
 * <SUBACCTFUND>
 *
 * Optional:
 * <GAIN>
 * ...many...
 *
 * Partial implementation.
 */
trait InvSell
{
    /**
     * Traits used to define properties
     */
    use LoaderTrait;
    use InvTran;
    use SecId;
    use Pricing;

    /**
     * @var float
     */
    public $commission;

    /**
     * @var float
     */
    public $taxes;

    /**
     * @var float
     */
    public $fees;

    /**
     * @var float
     */
    public $load;

    /**
     * @var float
     */
    public $gain;

    /**
     * @param SimpleXMLElement $node
     * @return $this for chaining
     */
    protected function loadInvSell(SimpleXMLElement $node)
    {
        $this->loadInvTran($node->INVTRAN)
            ->loadSecId($node->SECID)
            ->loadPricing($node)
            // These are all optional fields:
            ->loadMap([
                'commission' => 'COMMISSION',
                'taxes' => 'TAXES',
                'fees' => 'FEES',
                'load' => 'LOAD',
                'gain' => 'GAIN',
            ], $node);

        return $this;
    }
}
