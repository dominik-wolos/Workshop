<?php
declare(strict_types=1);

namespace App\EmailManager;

use Sylius\Component\Channel\Context\ChannelContextInterface;
use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Mailer\Sender\SenderInterface;

final class OrderNotificationEmailManager {


    /** @var SenderInterface  */
    private SenderInterface $sender;

    /** @var ChannelContextInterface */
    private ChannelContextInterface $channelContext;

    public function __construct(SenderInterface $sender, ChannelContextInterface $channelContext)
    {

        $this->sender = $sender;
        $this->channelContext = $channelContext;
    }

    public function notify(OrderInterface $order):void
    {
        /** @var ChannelInterface $channel */
        $channel = $this->channelContext->getChannel();

        $this->sender->send('order_notification',[$channel->getContactEmail()], ['order'=> $order]);
    }


}
