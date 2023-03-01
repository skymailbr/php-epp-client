<?php

namespace Metaregistrar\EPP;

class registrobrEppConnection extends eppConnection
{

    /**
     *
     * Path to certificate authority file
     * @var string
     */
    protected $local_ca_path;

    function __construct($logging = false, $settingsFile = null)
    {
        parent::__construct($logging, $settingsFile);
        parent::useExtension('brdomain-ext-1.0');
        parent::useExtension('brorg-ext-1.0');
    }

    public function addCommandResponse($command, $response)
    {
        parent::addCommandResponse($command, $response);
    }


    /**
     * Connect to the address and port
     * @param null $hostname
     * @param int $port
     * @return bool
     * @throws eppException
     */
    public function connect($hostname = null, $port = null)
    {
        if (!$this->local_ca_path) {
            return parent::connect($hostname, $port);
        }

        $context = stream_context_create();
        stream_context_set_option($context, 'ssl', 'ca_file', $this->local_ca_path);

        stream_context_set_option($context, 'ssl', 'verify_peer', $this->verify_peer);
        stream_context_set_option($context, 'ssl', 'verify_peer_name', $this->verify_peer_name);

        if ($this->local_cert_path) {
            stream_context_set_option($context, 'ssl', 'local_cert', $this->local_cert_path);
            if (isset($this->local_cert_pwd) && (strlen($this->local_cert_pwd) > 0)) {
                stream_context_set_option($context, 'ssl', 'passphrase', $this->local_cert_pwd);
            }
            if (isset($this->allow_self_signed)) {
                stream_context_set_option($context, 'ssl', 'allow_self_signed', $this->allow_self_signed);
                stream_context_set_option($context, 'ssl', 'verify_peer', false);
            } else {
                stream_context_set_option($context, 'ssl', 'verify_peer', $this->verify_peer);
            }
        }

        if ($hostname) {
            $this->hostname = $hostname;
        }
        if ($port) {
            $this->port = $port;
        }

        $this->connection = stream_socket_client($this->hostname . ':' . $this->port, $errno, $errstr, $this->timeout, STREAM_CLIENT_CONNECT, $context);
        if (is_resource($this->connection)) {
            stream_set_blocking($this->connection, $this->blocking);
            stream_set_timeout($this->connection, $this->timeout);
            if ($errno == 0) {
                $meta = stream_get_meta_data($this->connection);
                if (isset($meta['crypto'])) {
                    $this->writeLog("Stream opened to " . $this->getHostname() . " port " . $this->getPort() . " with protocol " . $meta['crypto']['protocol'] . ", cipher " . $meta['crypto']['cipher_name'] . ", " . $meta['crypto']['cipher_bits'] . " bits " . $meta['crypto']['cipher_version'], "Connection made");
                } else {
                    $this->writeLog("Stream opened to " . $this->getHostname() . " port " . $this->getPort(), "Connection made");
                }
                $this->connected = true;
                $this->read();
            }
            return $this->connected;
        } else {
            $this->writeLog("Connection could not be opened: $errno $errstr", "ERROR");
            return false;
        }

    }

    /**
     * @return string
     */
    public function getLocalCaPath(): string
    {
        return $this->local_ca_path;
    }

    /**
     * @param string $localCaPath
     */
    public function setLocalCaPath(string $localCaPath)
    {
        $this->local_ca_path = $localCaPath;
    }
}
