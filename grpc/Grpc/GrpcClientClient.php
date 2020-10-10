<?php
// GENERATED CODE -- DO NOT EDIT!

namespace Grpc;

/**
 */
class GrpcClientClient extends \Grpc\BaseStub {

    /**
     * @param string $hostname hostname
     * @param array $opts channel options
     * @param \Grpc\Channel $channel (optional) re-use channel object
     */
    public function __construct($hostname, $opts, $channel = null) {
        parent::__construct($hostname, $opts, $channel);
    }

    /**
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ClientStreamingCall
     */
    public function get($metadata = [], $options = []) {
        return $this->_clientStreamRequest('/grpc.GrpcClient/get',
        ['\Grpc\GrpcRequest','decode'],
        $metadata, $options);
    }

    /**
     * @param \Grpc\GrpcRequest $argument input argument
     * @param array $metadata metadata
     * @param array $options call options
     * @return \Grpc\ServerStreamingCall
     */
    public function set(\Grpc\GrpcRequest $argument,
      $metadata = [], $options = []) {
        return $this->_serverStreamRequest('/grpc.GrpcClient/set',
        $argument,
        ['\Grpc\GrpcRequest', 'decode'],
        $metadata, $options);
    }

}
