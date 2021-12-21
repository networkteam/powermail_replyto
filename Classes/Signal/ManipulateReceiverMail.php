<?php

namespace Networkteam\PowermailReplyTo\Signal;

use In2code\Powermail\Domain\Service\Mail\SendMailService;
use In2code\Powermail\Utility\TypoScriptUtility;
use TYPO3\CMS\Core\Mail\MailMessage;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\MailUtility;

class ManipulateReceiverMail
{
    public function moveSenderToReplyTo(MailMessage $mailMessage, array $email, SendMailService $sendMailService)
    {
        if ($sendMailService->getType() === 'receiver') {
            $overwrittenSender = TypoScriptUtility::overwriteValueFromTypoScript('', $sendMailService->getOverwriteConfig(), 'senderEmail');

            if (!GeneralUtility::validEmail($overwrittenSender)) {
                $mailMessage
                    ->setReplyTo([$email['senderEmail'] => $email['senderName']])
                    ->setFrom([
                        MailUtility::getSystemFromAddress() => MailUtility::getSystemFromName()
                    ]);
            }
        }
    }
}
