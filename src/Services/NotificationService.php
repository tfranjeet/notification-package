<?php
namespace Ranjeet\Notifications\Services;
use App\Models\NotificationLog;
use App\Models\NotificationTemplate;
class NotificationService
{
    public function dump()
    {
        dd('hello');
    }
    
    public function fetchTemplate($id)
    {
       $template =  NotificationTemplate::where('id', $id)->first();
        return  $template;
    }
    
    public function createNotificationLog($user_id, $notification_id, $placeholders)
    {
        $notification_template = $this->fetchTemplate($notification_id);
        
        foreach($placeholders as $key => $value)
        {
            $notification_template->content = str_replace('{{' . $key . '}}', $value, $notification_template->content);
        }
        $notification = new NotificationLog();
        $notification->user_id = $user_id;
        $notification->content = $notification_template->content;
        return $notification->save();
    }
}
