<?php

namespace App\Mongo;


use App\Transformer\AbstractResponseTransformer;
use MongoDB\Client;
use MongoDB\Collection;

abstract class AbstractDocumentRepository
{
    protected AbstractResponseTransformer $transformer;

    private Collection $collection;

    public function __construct(string $database, string $collection, AbstractResponseTransformer $albumTransformer)
    {
        $this->transformer = $albumTransformer;

        $this->collection = (new Client('mongodb://mongo/'))
            ->selectDatabase($database)
            ->selectCollection($collection);
    }

    public function find($criteria): array
    {
        $resultDocuments = $this->collection->find($criteria);
        return $this->transformer->transformFromObjects($resultDocuments);
    }

    public function fineOneBy($criteria)
    {
        $resultDocuments = $this->collection->find($criteria);
        $resultDocuments->rewind();
        return $this->transformer->transformFromObject($resultDocuments->current());
    }
}