<?php

namespace App\Models;

use CodeIgniter\Model;

class ActivityLogModel extends Model
{
    protected $table = 'activity_logs';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'user_id',
        'activity',
        'ip_address'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';

    public function getRecentActivities($limit = 10)
    {
        return $this->select('activity_logs.*, users.name as user_name')
                    ->join('users', 'users.id = activity_logs.user_id')
                    ->orderBy('activity_logs.created_at', 'DESC')
                    ->limit($limit)
                    ->find();
    }

    public function logActivity($userId, $activity)
    {
        return $this->insert([
            'user_id' => $userId,
            'activity' => $activity,
            'ip_address' => service('request')->getIPAddress()
        ]);
    }
} 