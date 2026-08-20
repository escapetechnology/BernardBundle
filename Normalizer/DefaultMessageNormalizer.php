<?php

namespace Bernard\BernardBundle\Normalizer;

use ArrayObject;
use Assert\Assertion;
use Bernard\Message\DefaultMessage;
use Bernard\Normalizer\PlainMessageNormalizer;

class DefaultMessageNormalizer extends PlainMessageNormalizer
{
    /**
     * {@inheritdoc}
     */
    public function normalize(mixed $data, ?string $format = null, array $context = []): ArrayObject|array|string|int|float|bool|null
    {
        @trigger_error('The '.__CLASS__.' class is deprecated and will removed in version 3.0. Use '.PlainMessageNormalizer::class.' instead.', E_USER_DEPRECATED);

        parent::normalize($data, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        @trigger_error('The '.__CLASS__.' class is deprecated and will removed in version 3.0. Use '.PlainMessageNormalizer::class.' instead.', E_USER_DEPRECATED);

        Assertion::notEmptyKey($data, 'name');
        Assertion::keyExists($data, 'arguments');
        Assertion::isArray($data['arguments']);

        return new DefaultMessage($data['name'], $data['arguments']);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return $type === DefaultMessage::class;
    }

    /**
     * {@inheritdoc}
     */
    public function supportsNormalization(mixed $data, ?string $format = null, array $context = []): bool
    {
        return $data instanceof DefaultMessage;
    }

    /**
     * {@inheritdoc}
     */
    public function getSupportedTypes(?string $format): array
    {
        return [
            DefaultMessage::class => true,
        ];
    }
}
