# my mvc with base php have laravel folder structure

- view có yield và section dùng thay thế các đoạn code con thực thi bên trong một code cha (lồng vào bên trong master layout, master layout mặc định là layouts.app)

- nếu muốn thay đổi master layout thì chỉ việc @extends('layouts.app') trong page cần thay

- khi muốn sử dụng 1 db driver khác thì tạo file vào folder database và viết hàm khởi tạo (__construct), viết lệnh kết nối với db, lưu trữ $connection với public