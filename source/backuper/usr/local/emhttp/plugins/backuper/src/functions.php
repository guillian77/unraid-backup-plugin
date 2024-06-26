<?php

if(!function_exists("readline")) {
    function readline($prompt = null, string $default = null) {
        if ($prompt) { echo "$prompt $default"; }

        $fp = fopen("php://stdin","r");

        return rtrim(fgets($fp, 1024));
    }
}

function fromCli():bool { return (php_sapi_name() === "cli"); };

function dd($to_debug): void
{
    if (!fromCli()) { echo "<pre class='debug'><code>"; }

    var_dump($to_debug);

    if (!fromCli()) { echo "</code></pre>"; }

    if (fromCli()) { echo "\n"; }

    die();
}

function spacer()
{
    if (!fromCli()) { echo "<hr/>"; }
    if (fromCli()) { echo "---------------------------------------"; }
    if (fromCli()) { echo "\n"; }
}

function dump($to_debug): void
{
    if (!fromCli()) { echo "<pre class='debug'><code>"; }

    var_dump($to_debug);

    if (!fromCli()) { echo "</code></pre>"; }

    if (fromCli()) { echo "\n"; }
}
