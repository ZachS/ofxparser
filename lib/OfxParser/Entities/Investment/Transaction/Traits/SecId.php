<?php

namespace OfxParser\Entities\Investment\Transaction\Traits;

use SimpleXMLElement;

use OfxParser\Entities\LoaderTrait;

/**
 * OFX 203 doc:
 * 13.8.1 Security Identification <SECID>
 */
trait SecId
{
    /**
     * Traits used to define properties
     */
    use LoaderTrait;

    /**
     * Identifier for the security being traded.
     * @var string
     */
    public $securityId;

    /**
     * The type of identifier for the security being traded.
     * @var string
     */
    public $securityIdType;

    /**
     * @param SimpleXMLElement $node
     * @return $this for chaining
     */
    protected function loadSecId(SimpleXMLElement $node)
    {
        // <SECID>
        //  - REQUIRED: <UNIQUEID>, <UNIQUEIDTYPE>
        $this->loadMap([
            'securityId' => 'UNIQUEID',
            'securityIdType' => 'UNIQUEIDTYPE',
        ], $node);

        return $this;
    }
}
