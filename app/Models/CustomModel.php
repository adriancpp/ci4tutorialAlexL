<?php namespace  App\Models;

use CodeIgniter\Database\ConnectionInterface;

class CustomModel{

    protected $db;

    public function __construct(ConnectionInterface &$db)
    {
        $this->db =& $db;
    }

    function all()
    {
        //"SELECT * FROM posts";
        return $this->db->table('posts')->get()->getResult();
    }

    function where()
    {
        //"SELECT * FROM posts";
        return $this->db->table('posts')
            ->where(['post_id >' => 6])
            ->where(['post_id <' => 9])
            ->orderBy('post_id', 'DESC')
            ->get()
            ->getResult(); // getRow()   <-- for one
    }

    function join()
    {
        //"SELECT * FROM posts";
        return $this->db->table('posts')
            ->where('post_id > ', 6)
            ->join('users', 'posts.post_author = users.user_id')  //, 'left')
            ->get()
            ->getResult(); // getRow()   <-- for one   getResult
    }

    function like()
    {
        //"SELECT * FROM posts";
        return $this->db->table('posts')
            ->like('post_title', 'dupa')
            ->join('users', 'posts.post_author = users.user_id')  //, 'left')
            ->get()
            ->getResult(); // getRow()   <-- for one   getResult
    }

    function grouping()
    {
        //"SELECT * FROM posts";
        return $this->db->table('posts')
            ->groupStart()
                ->where(['post_id >' => 7, 'post_updated_at < ' => '2023-01-07 16:21:44'])
            ->groupEnd()
            ->orWhere(['post_id ' => 6])
            ->join('users', 'posts.post_author = users.user_id')  //, 'left')
            ->get()
            ->getResult(); // getRow()   <-- for one   getResult
    }

    function whereIn()
    {
        $ids = [7,9];
        //"SELECT * FROM posts";
        return $this->db->table('posts')
            ->whereIn('post_id' , $ids)
            ->join('users', 'posts.post_author = users.user_id')  //, 'left')
            ->limit(1,1)
            ->get()
            ->getResult(); // getRow()   <-- for one   getResult
    }

    function getPosts()
    {
        $builder = $this->db->table('posts');
        $builder->join('users', 'posts.post_author = users.user_id');
        $posts = $builder->get()->getResult();
        return $posts;
    }

}