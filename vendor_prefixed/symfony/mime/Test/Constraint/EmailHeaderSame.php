<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Modular\ConnectorDependencies\Symfony\Component\Mime\Test\Constraint;

use Modular\ConnectorDependencies\PHPUnit\Framework\Constraint\Constraint;
use Modular\ConnectorDependencies\Symfony\Component\Mime\Header\UnstructuredHeader;
use Modular\ConnectorDependencies\Symfony\Component\Mime\RawMessage;
/** @internal */
final class EmailHeaderSame extends Constraint
{
    private $headerName;
    private $expectedValue;
    public function __construct(string $headerName, string $expectedValue)
    {
        $this->headerName = $headerName;
        $this->expectedValue = $expectedValue;
    }
    /**
     * {@inheritdoc}
     */
    public function toString() : string
    {
        return \sprintf('has header "%s" with value "%s"', $this->headerName, $this->expectedValue);
    }
    /**
     * @param RawMessage $message
     *
     * {@inheritdoc}
     */
    protected function matches($message) : bool
    {
        if (RawMessage::class === \get_class($message)) {
            throw new \LogicException('Unable to test a message header on a RawMessage instance.');
        }
        return $this->expectedValue === $this->getHeaderValue($message);
    }
    /**
     * @param RawMessage $message
     *
     * {@inheritdoc}
     */
    protected function failureDescription($message) : string
    {
        return \sprintf('the Email %s (value is %s)', $this->toString(), $this->getHeaderValue($message) ?? 'null');
    }
    private function getHeaderValue($message) : ?string
    {
        if (null === ($header = $message->getHeaders()->get($this->headerName))) {
            return null;
        }
        return $header instanceof UnstructuredHeader ? $header->getValue() : $header->getBodyAsString();
    }
}
