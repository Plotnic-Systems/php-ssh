<?php
namespace EDV\net\ssh;

class SSHStateEstabilished extends SSHStateConnected
{
    /*
     * (non-PHPdoc) @see \EDV\net\ssh\AbstractSSHState::authenticate()
     */
    public function authenticate(SSHAuthentication $auth, SSHConnection $context)
    {
        if (!$auth->authenticate($this->resource)) {
            throw new \RuntimeException('Authentication Failure');
        }

        $this->nextState(new SSHStateListening(), $context);

        return true;
    }

    /*
     * (non-PHPdoc) @see \EDV\net\ssh\AbstractSSHState::getFingerprint()
     */
    public function getFingerprint(SSHConnection $context)
    {
        return ssh2_fingerprint($this->resource,
            SSH2_FINGERPRINT_MD5 |\SSH2_FINGERPRINT_HEX);
    }
}