<?php
/* database_class ( active record pattern )-s */
class db_control{
    var $host;
    var $dbname;
    var $username;
    var $pass;
    var $table;
    var $field;
    var $limit;
    var $realid;
    var $myid;
    function get_myid()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $i=1;
        $sql="SELECT * FROM $this->table";
        $counter=db_get_rownum($this->table,"return");
        foreach($conn->query($sql,PDO::FETCH_ASSOC) as $row)
        {
            if($row['id']==$this->realid) return $counter-$i+1;
            else $i++;
        }
    }
    function row_count($get_type="echo")
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT COUNT(*) from $this->table");    
        $stmt->execute();
        $result=intval($stmt->fetchColumn());
        $conn=null;
        if($get_type=="echo") echo $result;
        elseif($get_type=="return") return $result;
    }
    function give_me_echo()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT $this->field from $this->table");    
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;        
        echo $result[$this->field];
    }
    function give_record($get_type="echo")
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT $this->field from $this->table order by -id limit $this->limit");
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        if($get_type=="echo") echo $result[$this->field];
        elseif($get_type=="return") return $result[$this->field];
        
    }
    function give_record_by_realid($get_type="echo")
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT $this->field from $this->table where id=$this->limit");
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        if($get_type=="echo") echo $result[$this->field];
        elseif($get_type=="return") return $result[$this->field];
    }
};
class post extends db_control{
    var $author;
    var $title;
    var $des;
    var $date;
    var $time;
    var $cat;
    var $id;
    var $tags;
    var $img;
    function make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("INSERT INTO $this->table (ttl,ct,des,dt,tm,tgs,aut,img) values (:ttl,:cat,:des,:date,:time,:tags,:aut,:img)");
        $stmt->bindParam(':ttl',$this->title);
        $stmt->bindParam(':img',$this->img);
        $stmt->bindParam(':cat',$this->cat);
        $stmt->bindParam(':des',$this->des);
        $stmt->bindParam(':date',$this->date);
        $stmt->bindParam(':time',$this->time);
        $stmt->bindParam(':tags',$this->tags);
        $stmt->bindParam(':aut',$this->author);
        $stmt->execute();
        $conn=null;
    }
    function edit()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("UPDATE $this->table SET ttl=:ttl,des=:des,ct=:cat,tgs=:tags,img=:img WHERE id=:id");
        $stmt->bindParam(':ttl',$this->title);
        $stmt->bindParam(':img',$this->img);
        $stmt->bindParam(':des',$this->des);
        $stmt->bindParam(':cat',$this->cat);
        $stmt->bindParam(':tags',$this->tags);
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function count_by_cats()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT COUNT(*) FROM $this->table WHERE ct=:cat");
        $stmt->bindParam(':cat',$this->cat);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return intval($result['COUNT(*)']);
    }
    function title_by_cat()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT ttl FROM $this->table WHERE ct=:cat order by -id limit $this->limit");
        $stmt->bindParam(':cat',$this->cat);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['ttl'];
    }
    function des_by_cat()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT des FROM $this->table WHERE ct=:cat order by -id limit $this->limit");
        $stmt->bindParam(':cat',$this->cat);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['des'];
    }
    function id_by_cat()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT id FROM $this->table WHERE ct=:cat order by -id limit $this->limit");
        $stmt->bindParam(':cat',$this->cat);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['id'];
    }
    function date_by_cat()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT dt FROM $this->table WHERE ct=:cat order by -id limit $this->limit");
        $stmt->bindParam(':cat',$this->cat);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['dt'];
    }
    function img_by_cat()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT img FROM $this->table WHERE ct=:cat order by -id limit $this->limit");
        $stmt->bindParam(':cat',$this->cat);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['img'];
    }
    function realid_by_title(){
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT id FROM $this->table WHERE ttl=:ttl");
        $stmt->bindParam(':ttl',$this->title);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['id'];
    }
};
class page extends db_control{
    var $title;
    var $des;
    var $author;
    var $id;
    function make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("INSERT INTO $this->table (ttl,des,aut) VALUES (:title,:des,:author)");
        $stmt->bindParam(':author',$this->author);
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':des',$this->des);
        $stmt->execute();
        $conn=null;
    }
    function edit()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("UPDATE $this->table SET ttl=:ttl,des=:des WHERE id=:id");
        $stmt->bindParam(':ttl',$this->title);
        $stmt->bindParam(':des',$this->des);
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function get_realid_by_title()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT id FROM $this->table WHERE ttl=:ttl");
        $stmt->bindParam(':ttl',$this->title);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result['id'];
    }
};
class cat extends db_control{
    var $name;
    var $id;
    function get_id()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT id FROM $this->table WHERE nm=:name");
        $stmt->bindParam(':name',$this->name);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
    function get_name()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT nm FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['nm'];
    }
    function make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("INSERT INTO $this->table (nm) VALUES (:name)");
        $stmt->bindParam(':name',$this->name);
        $stmt->execute();
        $conn=null;
    }
    function edit()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("UPDATE $this->table SET nm=:name WHERE id=:id");
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE nm=:name");
        $stmt->bindParam(':name',$this->name);
        $stmt->execute();
        $conn=null;
    }
};

class user extends db_control{
    var $name;
    var $uname;
    var $upass;
    var $valid;
    var $avatar;
    var $points;
    var $email;
    var $regdate;
    var $birthdate;
    var $permission="کاربر عادی";
    var $cat;
    var $id;
    var $limit;
    function search_count()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT COUNT(*) FROM bl_users WHERE unm LIKE '%$this->uname%'");
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['COUNT(*)']);
        $conn=null;
    }
    function search_get_id()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT * FROM bl_users WHERE unm=:username");
        $stmt->bindParam(':username',$this->uname);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
        $conn=null;
    }
    function get_username()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT * FROM bl_users WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['unm'];
        $conn=null;
    }
    function search()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT * FROM bl_users WHERE unm LIKE '%$this->uname%' limit $this->limit");
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['unm'];
        $conn=null;
    }
    function exist()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT COUNT(*) FROM $this->table WHERE (unm=:username) and (ps=:password)");
        $stmt->bindParam(':username',$this->uname);
        $stmt->bindParam(':password',$this->upass);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $exist_count=intval($result['COUNT(*)']);
        if($exist_count>=1) return TRUE;
        return FALSE;
    }
    function get_perm()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT prm FROM $this->table WHERE unm=:username");
        $stmt->bindParam(':username',$this->uname);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['prm'];
    }
    function make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("INSERT INTO $this->table (unm,ps,vld,avt,pt,eml,rdt,bdt,nm,prm,cat) VALUES
            (:username,:password,:valid,:avatar,0,:email,:regdate,:birthdate,:name,:permission,:category)");
        $stmt->bindParam(':username',$this->uname);
        $stmt->bindParam(':password',$this->upass);
        $stmt->bindParam(':valid',$this->valid);
        $stmt->bindParam(':avatar',$this->avatar);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':regdate',$this->regdate);
        $stmt->bindParam(':birthdate',$this->birthdate);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':permission',$this->permission);
        $stmt->bindParam(':category',$this->cat);
        $stmt->execute();
        $conn=null;
    }
    function changeperm()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("UPDATE $this->table SET prm=:permission WHERE unm=:username");
        $stmt->bindParam(':username',$this->uname);
        $stmt->bindParam(':permission',$this->permission);
        $stmt->execute();
        $conn=null;
    }
    function edit()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("UPDATE $this->table SET unm=:username,ps=:password,vld=:valid,avt=:avatar
            ,eml=:email,rdt=:regdate,bdt=:birthdate,nm=:name,prm=:permission,cat=:category WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':username',$this->uname);
        $stmt->bindParam(':password',$this->upass);
        $stmt->bindParam(':valid',$this->valid);
        $stmt->bindParam(':avatar',$this->avatar);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':regdate',$this->regdate);
        $stmt->bindParam(':birthdate',$this->birthdate);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':permission',$this->permission);
        $stmt->bindParam(':category',$this->cat);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE unm=:username");
        $stmt->bindParam(':username',$this->uname);
        $stmt->execute();
        $conn=null;
    }
};
class moi extends db_control{
    var $title;
    var $des;
    var $father;
    var $priority;
    var $id;
    function make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("INSERT INTO $this->table (ttl,des,fdr,prr) VALUES (:title,:des,:father,:priority)");
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':des',$this->des);
        $stmt->bindParam(':father',$this->father);
        $stmt->bindParam(':priority',$this->priority);
        $stmt->execute();
        $conn=null;
    }
    function edit()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("UPDATE $this->table SET ttl=:title,des=:des,fdr=:father,prr=:priority WHERE id=:id");
        $stmt->bindParam(':title',$this->title);
        $stmt->bindParam(':des',$this->des);
        $stmt->bindParam(':father',$this->father);
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':priority',$this->priority);
        $stmt->execute();
        $conn=null;
    }
    function delete_by_id()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE ttl=:title");
        $stmt->bindParam(':title',$this->title);
        $stmt->execute();
        $conn=null;
    }
    function get_title_by_prr_and_fdr()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT ttl FROM $this->table WHERE (prr=:priority) and (fdr=:father)");
        $stmt->bindParam(':priority',$this->priority);
        $stmt->bindParam(':father',$this->father);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['ttl'];
        $conn=null;
    }
    function get_des_by_prr_and_fdr()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT des FROM $this->table WHERE (prr=:priority) and (fdr=:father)");
        $stmt->bindParam(':priority',$this->priority);
        $stmt->bindParam(':father',$this->father);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['des'];
        $conn=null;
    }
    function count_subitems()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT COUNT(*) FROM $this->table WHERE fdr=:father");
        $stmt->bindParam(':father',$this->father);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['COUNT(*)']);
        $conn=null;
    }
};

class level extends db_control{
    var $display;
    var $posts;
    var $pages;
    var $users;
    var $visit;
    var $id;
    var $menu;
    function get_id()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT id FROM $this->table WHERE dpl=:display");
        $stmt->bindParam(':display',$this->display);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['id'];
    }
    function get_posts()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT pst FROM $this->table WHERE dpl=:display");
        $stmt->bindParam(':display',$this->display);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['pst']);
    }
    function get_pages()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT pgs FROM $this->table WHERE dpl=:display");
        $stmt->bindParam(':display',$this->display);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['pgs']);
    }
    function get_users()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT usr FROM $this->table WHERE dpl=:display");
        $stmt->bindParam(':display',$this->display);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['usr']);
    }
    function get_visits()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT vst FROM $this->table WHERE dpl=:display");
        $stmt->bindParam(':display',$this->display);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['vst']);
    }
    function get_menus()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT mns FROM $this->table WHERE dpl=:display");
        $stmt->bindParam(':display',$this->display);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return intval($result['mns']);
    }
    function make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("INSERT INTO $this->table (dpl,pst,usr,pgs,vst,mns) VALUES (:display,:posts,:users,:pages,:visit,:menu)");
        $stmt->bindParam(':display',$this->display);
        $stmt->bindParam(':posts',$this->posts);
        $stmt->bindParam(':users',$this->users);
        $stmt->bindParam(':pages',$this->pages);
        $stmt->bindParam(':visit',$this->visit);
        $stmt->bindParam(':menu',$this->menu);
        $stmt->execute();
        $conn=null;
    }
    function edit()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("UPDATE $this->table SET dpl=:display,pst=:posts,pgs=:pages,usr=:users,vst=:visit,mns=:menu WHERE id=:id");
        $stmt->bindParam(':display',$this->display);
        $stmt->bindParam(':posts',$this->posts);
        $stmt->bindParam(':users',$this->users);
        $stmt->bindParam(':pages',$this->pages);
        $stmt->bindParam(':visit',$this->visit);
        $stmt->bindParam(':menu',$this->menu);
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
};
class statistics extends db_control{
    var $id;
    var $year;
    var $month;
    var $day;
    var $before_seven;
    var $seven_to_twelve;
    var $twelve_to_seventeen;
    var $seventeen_to_twenty_one;
    var $twenty_one_to_twenty_four;
    function first_make()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("INSERT INTO $this->table (yer,mns,day,bfs,stt,tts,sto,otf) VALUES (:year,:month,:day,:bfs,:stt,:tts,:sto,:otf)");
        $stmt->bindParam(':year',$this->year);
        $stmt->bindParam(':month',$this->month);
        $stmt->bindParam(':day',$this->day);
        $stmt->bindParam(':bfs',$this->before_seven);
        $stmt->bindParam(':stt',$this->seven_to_twelve);
        $stmt->bindParam(':tts',$this->twelve_to_seventeen);
        $stmt->bindParam(':sto',$this->seventeen_to_twenty_one);
        $stmt->bindParam(':otf',$this->twenty_one_to_twenty_four);
        $stmt->execute();
        $conn=null;
    }
    function update()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("UPDATE $this->table SET bfs=:bfs,stt=:stt,tts=:tts,sto=:sto,otf=:otf WHERE (yer=:year) AND (mns=:month) AND (day=:day)");
        $stmt->bindParam(':year',$this->year);
        $stmt->bindParam(':month',$this->month);
        $stmt->bindParam(':day',$this->day);
        $stmt->bindParam(':bfs',$this->before_seven);
        $stmt->bindParam(':stt',$this->seven_to_twelve);
        $stmt->bindParam(':tts',$this->twelve_to_seventeen);
        $stmt->bindParam(':sto',$this->seventeen_to_twenty_one);
        $stmt->bindParam(':otf',$this->twenty_one_to_twenty_four);
        $stmt->execute();
        $conn=null;
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE (yer=:year) AND (mns=:month) AND (day=:day)");
        $stmt->bindParam(':year',$this->year);
        $stmt->bindParam(':month',$this->month);
        $stmt->bindParam(':day',$this->day);
        $stmt->execute();
        $conn=null;
    }
    function count()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);    
        $stmt=$conn->prepare("SELECT COUNT(*) FROM $this->table WHERE (yer=:year) AND (mns=:month) AND (day=:day)");
        $stmt->bindParam(':year',$this->year);
        $stmt->bindParam(':month',$this->month);
        $stmt->bindParam(':day',$this->day);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return intval($result['COUNT(*)']);
    }
};
class mct extends db_control{
    var $id;
    var $des;
    var $type;
    var $date;
    var $time;
    var $from;
    var $too;
    function send()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("INSERT INTO $this->table (des,type,dt,tm,frm,too) VALUES (:des,:type,:dt,:tm,:frm,:too)");
        $stmt->bindParam(':des',$this->des);
        $stmt->bindParam(':type',$this->type);
        $stmt->bindParam(':dt',$this->date);
        $stmt->bindParam(':tm',$this->time);
        $stmt->bindParam(':frm',$this->from);
        $stmt->bindParam(':too',$this->too);
        $stmt->execute();
        $conn=null;
    }
    function recieve()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("SELECT $this->field FROM $this->table WHERE (too=:too) AND (type=:type)  ORDER BY -id LIMIT $this->limit");
        $stmt->bindParam(':too',$this->too);
        $stmt->bindParam(':type',$this->type);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        $conn=null;
        return $result[$this->field];
    }
    function delete()
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", $this->username, $this->pass);
        $stmt=$conn->prepare("DELETE FROM $this->table WHERE (too=:too) AND (type=:type) AND (id=:id)");
        $stmt->bindParam(':too',$this->too);
        $stmt->bindParam(':type',$this->type);
        $stmt->bindParam(':id',$this->id);
        $stmt->execute();
        $conn=null;
    }
};

/* database_class ( active record pattern )-e */
/* the factory pattern-s */
function db_get_myid($table,$realid)
{
    $dbc=new db_control;
    $dbc->host=$GLOBALS['host'];
    $dbc->dbname=$GLOBALS['dbname'];
    $dbc->username=$GLOBALS['username'];
    $dbc->pass=$GLOBALS['pass'];
    $dbc->table=$table;
    $dbc->realid=$realid;
    return $dbc->get_myid();
}
function db_get_echo($table,$field)
{
    $dbc=new db_control;
    $dbc->host=$GLOBALS['host'];
    $dbc->dbname=$GLOBALS['dbname'];
    $dbc->username=$GLOBALS['username'];
    $dbc->pass=$GLOBALS['pass'];
    $dbc->table=$table;
    $dbc->field=$field;
    $dbc->give_me_echo();
}
function db_get_record_echo($table,$field,$limit)
{
    $dbc=new db_control;
    $dbc->host=$GLOBALS['host'];
    $dbc->dbname=$GLOBALS['dbname'];
    $dbc->username=$GLOBALS['username'];
    $dbc->pass=$GLOBALS['pass'];
    $dbc->table=$table;
    $dbc->field=$field;
    $dbc->limit=$limit;
    $dbc->give_record();
}
function db_get_record($table,$field,$limit)
{
    $dbc=new db_control;
    $dbc->host=$GLOBALS['host'];
    $dbc->dbname=$GLOBALS['dbname'];
    $dbc->username=$GLOBALS['username'];
    $dbc->pass=$GLOBALS['pass'];
    $dbc->table=$table;
    $dbc->field=$field;
    $dbc->limit=$limit;
    return $dbc->give_record("return");
}
function db_get_record_by_real_id($table,$field,$limit)
{
    $dbc=new db_control;
    $dbc->host=$GLOBALS['host'];
    $dbc->dbname=$GLOBALS['dbname'];
    $dbc->username=$GLOBALS['username'];
    $dbc->pass=$GLOBALS['pass'];
    $dbc->table=$table;
    $dbc->field=$field;
    $dbc->limit=$limit;
    return $dbc->give_record_by_realid("return");
}
function db_get_rownum($table,$get_type="echo")
{
    $dbc=new db_control;
    $dbc->host=$GLOBALS['host'];
    $dbc->dbname=$GLOBALS['dbname'];
    $dbc->username=$GLOBALS['username'];
    $dbc->pass=$GLOBALS['pass'];
    $dbc->table=$table;
    if($get_type=="echo") $dbc->row_count();
    elseif($get_type=="return") return $dbc->row_count("return");
}
function post_make($title,$des,$cat,$tgs,$author,$image)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->date=BL_DATE("default","return");
    $post->time=BL_TIME("return");
    $post->author=$author;
    $post->title=$title;
    $post->des=$des;
    $post->img=$image;
    $post->cat=BL_CAT_ID($cat);
    $post->tags=$tgs;
    $post->make();
}
function post_edit($id,$title,$des,$cat,$tgs,$image)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->date=BL_DATE("default","return");
    $post->time=BL_TIME("return");
    $post->title=$title;
    $post->img=$image;
    $post->des=$des;
    $post->cat=$cat;
    $post->tags=$tgs;
    $post->id=$id;
    $post->edit();
}
function post_delete($id)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->id=$id;
    $post->delete();
}
function post_count_by_cat($cat)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->cat=$cat;
    return $post->count_by_cats();
}
function post_title_by_cat($cat,$limit)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->cat=$cat;
    $post->limit=$limit;
    return $post->title_by_cat();
}
function post_des_by_cat($cat,$limit)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->cat=$cat;
    $post->limit=$limit;
    return $post->des_by_cat();
}
function post_id_by_cat($cat,$limit)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->cat=$cat;
    $post->limit=$limit;
    return $post->id_by_cat();
}
function post_img_by_cat($cat,$limit)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->cat=$cat;
    $post->limit=$limit;
    return $post->img_by_cat();
}
function post_date_by_cat($cat,$limit)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->cat=$cat;
    $post->limit=$limit;
    return $post->date_by_cat();
}
function post_realid_by_title($title)
{
    $post=new post();
    $post->host=$GLOBALS['host'];
    $post->dbname=$GLOBALS['dbname'];
    $post->username=$GLOBALS['username'];
    $post->pass=$GLOBALS['pass'];
    $post->table=$GLOBALS['posts_table'];
    $post->title=$title;
    return $post->realid_by_title();
}
function user_new($username,$password,$valid,$avatar,$points,$email,$regdate,$birthdate,$name,$category)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->avatar=$avatar;
    $user->birthdate=$birthdate;
    $user->cat=$category;
    $user->uname=$username;
    $user->upass=$password;
    $user->valid=$valid;
    $user->points=$points;
    $user->email=$email;
    $user->regdate=$regdate;
    $user->permission="کاربر عادی";
    $user->name=$name;
    $user->make();
}
function user_edit($username,$password,$valid,$avatar,$points,$email,$regdate,$birthdate,$name,$permission,$category,$id)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->avatar=$avatar;
    $user->birthdate=$birthdate;
    $user->cat=$category;
    $user->uname=$username;
    $user->upass=$password;
    $user->valid=$valid;
    $user->points=$points;
    $user->email=$email;
    $user->regdate=$regdate;
    $user->permission=$permission;
    $user->name=$name;
    $user->id=$id;
    $user->edit();
}
function user_delete($username)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    $user->delete();
}
function user_get_perm($username)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    return $user->get_perm();
}
function user_get_username_by_id($id)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->id=$id;
    return $user->get_username();
}
function user_search_count($username)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    return $user->search_count();
}
function user_search($username,$limit)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    $user->limit=$limit;
    return $user->search();
}
function user_search_get_id($username)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    return $user->search_get_id();
}
function user_exist($username,$password)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    $user->upass=$password;
    return $user->exist();
}
function user_changeperm($username,$permission)
{
    $user=new user();
    $user->host=$GLOBALS['host'];
    $user->dbname=$GLOBALS['dbname'];
    $user->username=$GLOBALS['username'];
    $user->pass=$GLOBALS['pass'];
    $user->table=$GLOBALS['users_table'];
    $user->uname=$username;
    $user->permission=$permission;
    $user->changeperm();
}
function page_new($title,$des,$author)
{
    $page=new page();
    $page->table=$GLOBALS['pages_table'];
    $page->host=$GLOBALS['host'];
    $page->dbname=$GLOBALS['dbname'];
    $page->username=$GLOBALS['username'];
    $page->pass=$GLOBALS['pass'];
    $page->title=$title;
    $page->author=$author;
    $page->des=$des;
    $page->make();
}
function page_edit($title,$des,$id)
{
    $page=new page();
    $page->host=$GLOBALS['host'];
    $page->table=$GLOBALS['pages_table'];
    $page->dbname=$GLOBALS['dbname'];
    $page->username=$GLOBALS['username'];
    $page->pass=$GLOBALS['pass'];
    $page->title=$title;
    $page->id=$id;
    $page->des=$des;
    $page->edit();
}
function page_delete($id)
{
    $page=new page();
    $page->host=$GLOBALS['host'];
    $page->table=$GLOBALS['pages_table'];
    $page->dbname=$GLOBALS['dbname'];
    $page->username=$GLOBALS['username'];
    $page->pass=$GLOBALS['pass'];
    $page->id=$id;
    $page->delete();
}
function page_realid_by_title($title)
{
    $page=new page();
    $page->host=$GLOBALS['host'];
    $page->table=$GLOBALS['pages_table'];
    $page->dbname=$GLOBALS['dbname'];
    $page->username=$GLOBALS['username'];
    $page->pass=$GLOBALS['pass'];
    $page->title=$title;
    return $page->get_realid_by_title($title);
}
function level_new($display,$posts,$users,$pages,$visit,$menu)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    $level->posts=$posts;
    $level->users=$users;
    $level->pages=$pages;
    $level->visit=$visit;
    $level->menu=$menu;
    $level->make();
}
function level_edit($display,$posts,$users,$pages,$visit,$id,$menu)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    $level->posts=$posts;
    $level->users=$users;
    $level->pages=$pages;
    $level->visit=$visit;
    $level->id=$id;
    $level->menu=$menu;
    $level->edit();
}
function level_delete($id)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->id=$id;
    $level->delete();
}
function level_posts($display)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    return $level->get_posts();
}
function level_pages($display)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    return $level->get_pages();
}
function level_users($display)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    return $level->get_users();
}
function level_visits($display)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    return $level->get_visits();
}
function level_menu($display)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    return $level->get_menus();
}
function level_id($display)
{
    $level=new level();
    $level->host=$GLOBALS['host'];
    $level->table=$GLOBALS['levels_table'];
    $level->dbname=$GLOBALS['dbname'];
    $level->username=$GLOBALS['username'];
    $level->pass=$GLOBALS['pass'];
    $level->display=$display;
    return $level->get_id();
}
function cat_new($name)
{
    $cat=new cat();
    $cat->host=$GLOBALS['host'];
    $cat->table=$GLOBALS['cats_table'];
    $cat->dbname=$GLOBALS['dbname'];
    $cat->username=$GLOBALS['username'];
    $cat->pass=$GLOBALS['pass'];
    $cat->name=$name;
    $cat->make();
}
function cat_edit($name,$id)
{
    $cat=new cat();
    $cat->host=$GLOBALS['host'];
    $cat->table=$GLOBALS['cats_table'];
    $cat->dbname=$GLOBALS['dbname'];
    $cat->username=$GLOBALS['username'];
    $cat->pass=$GLOBALS['pass'];
    $cat->name=$name;
    $cat->id=$id;
    $cat->edit();
}
function cat_delete($name)
{
    $cat=new cat();
    $cat->host=$GLOBALS['host'];
    $cat->table=$GLOBALS['cats_table'];
    $cat->dbname=$GLOBALS['dbname'];
    $cat->username=$GLOBALS['username'];
    $cat->pass=$GLOBALS['pass'];
    $cat->name=$name;
    $cat->delete();
}
function cat_id($name)
{
    $cat=new cat();
    $cat->host=$GLOBALS['host'];
    $cat->table=$GLOBALS['cats_table'];
    $cat->dbname=$GLOBALS['dbname'];
    $cat->username=$GLOBALS['username'];
    $cat->pass=$GLOBALS['pass'];
    $cat->name=$name;
    return $cat->get_id();
}
function cat_name($id)
{
    $cat=new cat();
    $cat->host=$GLOBALS['host'];
    $cat->table=$GLOBALS['cats_table'];
    $cat->dbname=$GLOBALS['dbname'];
    $cat->username=$GLOBALS['username'];
    $cat->pass=$GLOBALS['pass'];
    $cat->id=$id;
    return $cat->get_name();
}
function moi_new($title,$des,$father,$priority)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->title=$title;
    $moi->des=$des;
    $moi->father=$father;
    $moi->priority=$priority;
    $moi->make();
}
function moi_edit($title,$des,$father,$priority,$id)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->title=$title;
    $moi->des=$des;
    $moi->id=$id;
    $moi->father=$father;
    $moi->priority=$priority;
    $moi->edit();
}
function moi_delete($title)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->title=$title;
    $moi->delete();
}
function moi_delete_by_id($id)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->id=$id;
    $moi->delete_by_id();
}
function moi_get_title_by_priority_and_father($priority,$father)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->priority=$priority;
    $moi->father=$father;
    return $moi->get_title_by_prr_and_fdr();
}
function moi_get_des_by_priority_and_father($priority,$father)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->priority=$priority;
    $moi->father=$father;
    return $moi->get_des_by_prr_and_fdr();
}
function moi_count_subitems($father)
{
    $moi=new moi();
    $moi->host=$GLOBALS['host'];
    $moi->table=$GLOBALS['menus_table'];
    $moi->dbname=$GLOBALS['dbname'];
    $moi->username=$GLOBALS['username'];
    $moi->pass=$GLOBALS['pass'];
    $moi->father=$father;
    return $moi->count_subitems();
}
function stats_counter()
{
    $stat=new statistics();
    $stat->host=$GLOBALS['host'];
    $stat->table=$GLOBALS['stats_table'];
    $stat->dbname=$GLOBALS['dbname'];
    $stat->username=$GLOBALS['username'];
    $stat->pass=$GLOBALS['pass'];
    $stat->day=BL_DAY();
    $stat->year=BL_YEAR();
    $stat->month=BL_MONTH();
    if($stat->count()==0)
    {
        if(BL_HOUR()<7){
            $stat->before_seven=1;
            $stat->seven_to_twelve=0;
            $stat->twelve_to_seventeen=0;
            $stat->seventeen_to_twenty_one=0;
            $stat->twenty_one_to_twenty_four=0;
        }
        elseif(BL_HOUR()>=7 && BL_HOUR()<12)
        {
            $stat->before_seven=0;
            $stat->seven_to_twelve=1;
            $stat->twelve_to_seventeen=0;
            $stat->seventeen_to_twenty_one=0;
            $stat->twenty_one_to_twenty_four=0;
        }
        elseif(BL_HOUR()>=12 && BL_HOUR()<17)
        {
            $stat->before_seven=0;
            $stat->seven_to_twelve=0;
            $stat->twelve_to_seventeen=1;
            $stat->seventeen_to_twenty_one=0;
            $stat->twenty_one_to_twenty_four=0;
        }
        elseif(BL_HOUR()>=17 && BL_HOUR()<21)
        {
            $stat->before_seven=0;
            $stat->seven_to_twelve=0;
            $stat->twelve_to_seventeen=0;
            $stat->seventeen_to_twenty_one=1;
            $stat->twenty_one_to_twenty_four=0;
        }
        elseif(BL_HOUR()>=21 && BL_HOUR()<=24)
        {
            $stat->before_seven=0;
            $stat->seven_to_twelve=0;
            $stat->twelve_to_seventeen=0;
            $stat->seventeen_to_twenty_one=0;
            $stat->twenty_one_to_twenty_four=1;
        }
        $stat->first_make();
    }
    else
    {
        if(BL_HOUR()<7)
        {
            $stat->before_seven=BL_STATS_GET(1,"bfs")+1;
            $stat->seven_to_twelve=BL_STATS_GET(1,"stt");
            $stat->twelve_to_seventeen=BL_STATS_GET(1,"tts");
            $stat->seventeen_to_twenty_one=BL_STATS_GET(1,"sto");
            $stat->twenty_one_to_twenty_four=BL_STATS_GET(1,"otf");
        }
        elseif(BL_HOUR()>=7 && BL_HOUR()<12)
        {
            $stat->before_seven=BL_STATS_GET(1,"bfs");
            $stat->seven_to_twelve=BL_STATS_GET(1,"stt")+1;
            $stat->twelve_to_seventeen=BL_STATS_GET(1,"tts");
            $stat->seventeen_to_twenty_one=BL_STATS_GET(1,"sto");
            $stat->twenty_one_to_twenty_four=BL_STATS_GET(1,"otf");
        }
        elseif(BL_HOUR()>=12 && BL_HOUR()<17)
        {
            $stat->before_seven=BL_STATS_GET(1,"bfs");
            $stat->seven_to_twelve=BL_STATS_GET(1,"stt");
            $stat->twelve_to_seventeen=BL_STATS_GET(1,"tts")+1;
            $stat->seventeen_to_twenty_one=BL_STATS_GET(1,"sto");
            $stat->twenty_one_to_twenty_four=BL_STATS_GET(1,"otf");
        }
        elseif(BL_HOUR()>=17 && BL_HOUR()<21)
        {
            $stat->before_seven=BL_STATS_GET(1,"bfs");
            $stat->seven_to_twelve=BL_STATS_GET(1,"stt");
            $stat->twelve_to_seventeen=BL_STATS_GET(1,"tts");
            $stat->seventeen_to_twenty_one=BL_STATS_GET(1,"sto")+1;
            $stat->twenty_one_to_twenty_four=BL_STATS_GET(1,"otf");
        }
        elseif(BL_HOUR()>=21 && BL_HOUR()<=24)
        {
            $stat->before_seven=BL_STATS_GET(1,"bfs");
            $stat->seven_to_twelve=BL_STATS_GET(1,"stt");
            $stat->twelve_to_seventeen=BL_STATS_GET(1,"tts");
            $stat->seventeen_to_twenty_one=BL_STATS_GET(1,"sto");
            $stat->twenty_one_to_twenty_four=BL_STATS_GET(1,"otf")+1;
        }
        $stat->update();
    }
}
function send_message($from,$too,$des)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->des=$des;
    $mct->from=$from;
    $mct->too=$too;
    $mct->date=BL_DATE("","return");
    $mct->time=BL_TIME("return");
    $mct->type="msg";
    $mct->send();
}
function recieve_message($field,$too,$limit)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->field=$field;
    $mct->too=$too;
    $mct->limit=$limit;
    $mct->type="msg";
    return $mct->recieve();
}
function delete_message($too,$id)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->too=$too;
    $mct->id=$id;
    $mct->type="msg";
    return $mct->delete();
}
function send_comment($from,$postid,$des)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->des=$des;
    $mct->from=$from;
    $mct->too=$postid;
    $mct->date=BL_DATE("","return");
    $mct->time=BL_TIME("return");
    $mct->type="comment";
    $mct->send();
}
function recieve_comment($field,$postid,$limit)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->field=$field;
    $mct->too=$postid;
    $mct->limit=$limit;
    $mct->type="activecomment";
    return $mct->recieve();
}
function delete_comment($postid,$id)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->too=$postid;
    $mct->id=$id;
    $mct->type="comment";
    return $mct->delete();
}
function send_ticket($from,$subject,$des)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->des=$des;
    $mct->from=$from;
    $mct->too=$subject;
    $mct->date=BL_DATE("","return");
    $mct->time=BL_TIME("return");
    $mct->type="ticket";
    $mct->send();
}
function recieve_ticket($field,$subject,$limit)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->field=$field;
    $mct->too=$subject;
    $mct->limit=$limit;
    $mct->type="ticket";
    return $mct->recieve();
}
function delete_ticket($subject,$id)
{
    $mct=new mct();
    $mct->host=$GLOBALS['host'];
    $mct->table=$GLOBALS['mct_table'];
    $mct->dbname=$GLOBALS['dbname'];
    $mct->username=$GLOBALS['username'];
    $mct->pass=$GLOBALS['pass'];
    $mct->too=$subject;
    $mct->id=$id;
    $mct->type="ticket";
    return $mct->delete();
}
/* the factory pattern-e */
?>
