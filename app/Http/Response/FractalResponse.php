<?php

namespace App\Http\Response;

use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;
use League\Fractal\Resource\ResourceInterface;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\SerializerAbstract;

/**
 * Class FractalResponse
 *
 * @package App\Http\Response
 */
class FractalResponse {

    /**
     * @var Manager
     */
    private $manager;


    /**
     * @var SerializerAbstract
     */
    private $serializer;


    /**
     * FractalResponse constructor.
     *
     * @param \League\Fractal\Manager                       $manager
     * @param \League\Fractal\Serializer\SerializerAbstract $serializer
     */
    public function __construct(Manager $manager, SerializerAbstract $serializer)
    {
        $this->manager = $manager;
        $this->serializer = $serializer;
        $this->manager->setSerializer($serializer);
    }

    /**
     * @param                                     $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param null                                $resourceKey
     *
     * @return array
     */
    public function item($data, TransformerAbstract $transformer, $resourceKey = null)
    {
        $resource = new Item($data, $transformer, $resourceKey);

        return $this->manager->createData($resource)->toArray();
    }

    /**
     * @param                                     $data
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param null                                $resourceKey
     *
     * @return array
     */
    public function collection($data, TransformerAbstract $transformer, $resourceKey = null)
    {
        $resource = new Collection($data, $transformer, $resourceKey);

        $resource->setPaginator(new IlluminatePaginatorAdapter($data));

        return $this->manager->createData($resource)->toArray();
    }

    public function createDataArray(ResourceInterface $resource)
    {
        return $this->manager->createData($resource)->toArray();
    }



}

?>
