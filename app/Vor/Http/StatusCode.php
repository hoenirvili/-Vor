<?php declare(strict_types=1);

namespace Vor\Http;

use InvalidArgumentException;

class StatusCode {
    // Informational - Request received, continuing process
    const CONTINUE                        = 100;
    const SWITCHING_PROTOCOLS             = 101;
    const PROCESSING                      = 102;
    // Success - The action was successfully
    // received, understood, and accepted
    const OK                              = 200;
    const CREATED                         = 201;
    const ACCEPTED                        = 202;
    const NONAUTHORITATIVE_INFORMATION    = 203;
    const NO_CONTENT                      = 204;
    const RESET_CONTENT                   = 205;
    const PARTIAL_CONTENT                 = 206;
    const MULTI_STATUS                    = 207;
    const ALREADY_REPORTED                = 208;
    const IM_USED                         = 226;
    // Redirection - Further action must be taken
    // in order to complete the request
    const MULTIPLE_CHOICES                = 300;
    const MOVED_PERMANENTLY               = 301;
    const FOUND                           = 302;
    const SEE_OTHER                       = 303;
    const NOT_MODIFIED                    = 304;
    const USE_PROXY                       = 305;
    const TEMPORARY_REDIRECT              = 307;
    const PERMANENT_REDIRECT              = 308;
    // Client Error - The request contains bad
    // syntax or cannot be fulfilled
    const BAD_REQUEST                     = 400;
    const UNAUTHORIZED                    = 401;
    const PAYMENT_REQUIRED                = 402;
    const FORBIDDEN                       = 403;
    const NOT_FOUND                       = 404;
    const METHOD_NOT_ALLOWED              = 405;
    const NOT_ACCEPTABLE                  = 406;
    const PROXY_AUTHENTICATION_REQUIRED   = 407;
    const REQUEST_TIMEOUT                 = 408;
    const CONFLICT                        = 409;
    const GONE                            = 410;
    const LENGTH_REQUIRED                 = 411;
    const PRECONDITION_FAILED             = 412;
    const REQUEST_ENTITY_TOO_LARGE        = 413;
    const REQUEST_URI_TOO_LONG            = 414;
    const UNSUPPORTED_MEDIA_TYPE          = 415;
    const REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const EXPECTATION_FAILED              = 417;
    const TEA_POT                         = 418;
    const MISDIRECTED_REQUEST             = 421;
    const UNPROCESSABLE_ENTITY            = 422;
    const LOCKED                          = 423;
    const FAILED_DEPENDENCY               = 424;
    const UPGRADE_REQUIRED                = 426;
    const PRECONDITION_REQUIRED           = 428;
    const TOO_MANY_REQUESTS               = 429;
    const REQUEST_HEADER                  = 431;
    const UNAVAILABLE_FOR_LEGAL_REASONS   = 451;
    // Server Error - The server failed to
    // fulfill an apparently valid request
    const INTERNAL_SERVER_ERROR           = 500;
    const NOT_IMPLEMENTED                 = 501;
    const BAD_GATEWAY                     = 502;
    const SERVICE_UNAVAILABLE             = 503;
    const GATEWAY_TIMEOUT                 = 504;
    const VERSION_NOT_SUPPORTED           = 505;
    const VARIANT_ALSO_NEGOTIATES         = 506;
    const INSUFFICIENT_STORAGE            = 507;
    const LOOP_DETECTED                   = 508;
    const NOT_EXTENDED                    = 510;
    const NETWORK_AUTHENTICATION_REQUIRED = 511;

    private $map = [
        StatusCode::CONTINUE                        => "Continue",
        StatusCode::SWITCHING_PROTOCOLS             => "Switching Protocols",
        StatusCode::PROCESSING                      => "Processing",
        StatusCode::OK                              => "OK",
        StatusCode::CREATED                         => "Created",
        StatusCode::ACCEPTED                        => "Accepted",
        StatusCode::NONAUTHORITATIVE_INFORMATION    => "Non-authoritative Information",
        StatusCode::NO_CONTENT                      => "No Content",
        StatusCode::RESET_CONTENT                   => "Reset Content",
        StatusCode::PARTIAL_CONTENT                 => "Partial Content",
        StatusCode::MULTI_STATUS                    => "Multi-Status",
        StatusCode::ALREADY_REPORTED                => "Already Reported",
        StatusCode::IM_USED                         => "IM Used",
        StatusCode::MULTIPLE_CHOICES                => "Multiple Choices",
        StatusCode::MOVED_PERMANENTLY               => "Moved Permanently",
        StatusCode::FOUND                           => "Found",
        StatusCode::SEE_OTHER                       => "See Other",
        StatusCode::NOT_MODIFIED                    => "Not Modified",
        StatusCode::USE_PROXY                       => "Use Proxy",
        StatusCode::TEMPORARY_REDIRECT              => "Temporary Redirect",
        StatusCode::PERMANENT_REDIRECT              => "Permanent Redirect",
        StatusCode::BAD_REQUEST                     => "BAD REQUEST",
        StatusCode::UNAUTHORIZED                    => "Unauthorized",
        StatusCode::PAYMENT_REQUIRED                => "Payment Required",
        StatusCode::FORBIDDEN                       => "Forbidden",
        StatusCode::NOT_FOUND                       => "Not Found",
        StatusCode::METHOD_NOT_ALLOWED              => "Method Not Allowed",
        StatusCode::NOT_ACCEPTABLE                  => "Not Acceptable",
        StatusCode::PROXY_AUTHENTICATION_REQUIRED   => "Proxy Authentication Required",
        StatusCode::REQUEST_TIMEOUT                 => "Request Timeout",
        StatusCode::CONFLICT                        => "Conflict",
        StatusCode::GONE                            => "Gone",
        StatusCode::LENGTH_REQUIRED                 => "Length Required",
        StatusCode::PRECONDITION_FAILED             => "Precondition Failed",
        StatusCode::REQUEST_ENTITY_TOO_LARGE        => "Payload Too Large",
        StatusCode::REQUEST_URI_TOO_LONG            => "Request-URI Too Long",
        StatusCode::UNSUPPORTED_MEDIA_TYPE          => "Unsupported Media Type",
        StatusCode::REQUESTED_RANGE_NOT_SATISFIABLE => "Requested Range Not Satisfiable",
        StatusCode::EXPECTATION_FAILED              => "Expectation Failed",
        StatusCode::TEA_POT                         => "I'm a teapot",
        StatusCode::MISDIRECTED_REQUEST             => "Misdirected Request",
        StatusCode::UNPROCESSABLE_ENTITY            => "Unprocessable Entity",
        StatusCode::LOCKED                          => "Locked",
        StatusCode::FAILED_DEPENDENCY               => "Failed Dependency",
        StatusCode::UPGRADE_REQUIRED                => "Upgrade Required",
        StatusCode::PRECONDITION_REQUIRED           => "Precondition Required",
        StatusCode::TOO_MANY_REQUESTS               => "Too Many Requests",
        StatusCode::REQUEST_HEADER                  => "Request Header Fields Too Large",
        StatusCode::UNAVAILABLE_FOR_LEGAL_REASONS   => " Unavailable For Legal Reasons",
        StatusCode::INTERNAL_SERVER_ERROR           => "Internal Server Error",
        StatusCode::NOT_IMPLEMENTED                 => "Not Implemented",
        StatusCode::BAD_GATEWAY                     => "Bad Gateway",
        StatusCode::SERVICE_UNAVAILABLE             => "Service Unavailable",
        StatusCode::GATEWAY_TIMEOUT                 => "Gateway Timeout",
        StatusCode::VERSION_NOT_SUPPORTED           => "HTTP Version Not Supported",
        StatusCode::VARIANT_ALSO_NEGOTIATES         => "Variant Also Negotiates",
        StatusCode::INSUFFICIENT_STORAGE            => "Insufficient Storage",
        StatusCode::LOOP_DETECTED                   => "Loop Detected",
        StatusCode::NOT_EXTENDED                    => "Not Extended",
        StatusCode::NETWORK_AUTHENTICATION_REQUIRED => "Network Authentication Required"
    ];

    private $code = 0;

    public function __construct(int $code = StatusCode::OK) {
        if (!isset($this->map[$code])) {
            throw new InvalidArgumentException("Invalid status code given");
        }

        $this->code = $code;
    }

    private function __clone(){}

    public function __toString() :string {
        return $map[$code];
    }

    public function code() :int{
       return $this->code;
    }
}