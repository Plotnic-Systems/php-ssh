<?php
namespace EDV\net\ssh;

class SSHStateConnected extends AbstractSSHState
{
    /*
     * (non-PHPdoc) @see \EDV\net\ssh\AbstractSSHState::close()
     */
    public function close(SSHConnection $context)
    {
        $this->resource = null;
        $this->nextState(new SSHStateClosed(), $context);
    }
}