# my mvc with base php have laravel folder structure

view có yield và section dùng thay thế các đoạn code con thực thi bên trong một code cha (lồng vào bên trong master layout, master layout mặc định là layouts.app)

nếu muốn thay đổi master layout thì chỉ việc thêm tham số thứ 3 vào function
$this->view($page, $data=[], $layout='layouts.app')