<?php

namespace Lexik\Bundle\FormFilterBundle\Filter\Transformer;

/**
 * Transformer aggregator
 *
 * @author <g.gauthier@lexik.com>
 *
 */
class TransformerAggregator
{
    /**
     * @var array
     */
    protected $filterTransformers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->filterTransformers = array();
    }

    /**
     * Add filter transformer
     *
     * @param string                     $id          Service filter transformer id
     * @param FilterTransformerInterface $transformer Service filter transformer instance
     */
    public function addFilterTransformer($id, $transformer)
    {
        if (!(isset($this->filterTransformers[$id]))) {
            $this->filterTransformers[$id] = $transformer;
        }
    }

    /**
     * Get service filter transformer by id
     *
     * @param string $id Service id
     *
     * @throws \Exception
     *
     * @return FilterTransformerInterface
     */
    public function get($id)
    {
        if (!isset($this->filterTransformers[$id])) {
            throw new \Exception(sprintf('No filter transformer found with id %s', $id));
        }

        return $this->filterTransformers[$id];
    }
}

