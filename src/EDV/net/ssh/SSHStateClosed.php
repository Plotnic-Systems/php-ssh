<?php
namespace EDV\net\ssh;

class SSHStateClosed extends AbstractSSHState
{
    private $context;

    /*
     * (non-PHPdoc) @see \EDV\net\ssh\AbstractSSHState::open()
     */
    public function open($host, $port = 22, SSHConnection $context)
    {
        $resource = ssh2_connect($host, $port, array(
            'disconnect' => array($this,'disconnect')
        ));

        if (!is_resource($resource)) {
            throw new \RuntimeException(
                'The connection could not be established.');
        }

        $this->context = $context;
        $this->resource = $resource;
        $this->nextState(new SSHStateEstabilished(), $context);

        return true;
    }

    public function disconnect()
    {
        $this->resource = null;
        $this->nextState(new SSHStateClosed(), $this->context);
    }
}