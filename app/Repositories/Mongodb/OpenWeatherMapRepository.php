<?php

namespace App\Repositories\Mongodb;

/**
 * 
 */
class OpenWeatherMapRepository
{
	/**
     * The mongodb collection
     *
     * @var string
     */
    protected $collection;

    protected $mongoClient;

    public function __construct() {
    	$database = config('database.connections.mongodb.database');
    	$collection_name = config('api.sensorpush.mongo_collection_name');

        $this->mongoClient = (new \MongoDB\Client)->$database;

        // $this->collection = (new \MongoDB\Client)->$database->$collection_name;
    }

    public function save($collection,$data) : int
    {
    	$insertOneResult = $this->mongoClient->$collection->insertOne($data);

    	return $insertOneResult->getInsertedCount();
    }

    public function findOne(array $fields) : object
    {
    	return $this->collection->findOne($fields);
    }

    public function findAll(array $fields) : object
    {
    	return $this->collection->find($fields);
    }

    public function updateOne(array $fields, array $value) : object
    {
    	$update = $this->collection->updateOne($fields,['$set' => $value]);

    	return $update->getMatchedCount();
    }

    public function updateMany(array $fields, array $value) : object
    {
    	$update = $this->collection->updateMany($fields,['$set' => $value]);

    	return $update->getMatchedCount();
    }

    public function delete(array $fields) : object
    {
    	$delete = $this->collection->deleteOne($fields);

    	return $delete->getDeletedCount();
    }
}