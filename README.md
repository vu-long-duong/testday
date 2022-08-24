

## About Laravel
1. MVC 

MVC là viết tắt của ba từ Model – View – Controller. Đây là một mô hình giúp cho việc phát triển phần mềm được trở nên gọn gàng và dễ dàng hơn. Mô hình này được dùng khá rộng rãi và đặc biệt là trong các ngôn ngữ lập trình web. Trong PHP hiện tại có khá nhiều Framework và hầu hết tất cả đều xây dựng dựa trên mô hình MVC.
Trong đó:

Model: cấu trúc dữ liệu theo cách tin cậy và chuẩn bị dữ liệu theo lệnh của controller

View: Hiển thị dữ liệu cho người dùng theo cách dễ hiểu dựa trên hành động của người dùng.

Controller: Nhận lệnh từ người dùng, gửi lệnh đến cho Model để cập nhập dữ liệu, truyền lệnh đến View để cập nhập giao diện hiển thị.

Ưu điểm:

    Hệ thống phân ra từng phần nên dễ dáng phát triển
    Chia thành nhiều modun nhỏ nên nhiều người có thể làm chung dự án
    Vấn đề bảo trì ứng dụng cũng tương đối, dễ nâng cấp
    Dễ dàng debug trong quá trình xây dựng

Nhược điểm:

    Hệ thống có thể chạy chậm hơn PHP thuần một chút ít, tuy nhiên nó ko phải là vấn đề với các hệ thống mạnh mẽ như ngày nay.

2. MVC trong laravel

Mọi Request từ phía người dùng đều phải qua Route, dữ liệu được gửi xuống Controller để xử lý, cần dữ liệu sẽ lấy từ Model lên hoặc cập nhật dữ liệu xuống Model, kết quả gửi ra View cho người sử dụng.

3. Cài đặt và cấu hình trong laravel
Tạo project:
composer create-project laravel/laravel  <tenfroject>

Khởi chạy serve:
php artisan serve

Cấu hình các thông số cơ bản trong Laravel(file .env)
APP_NAME: tên ứng dụng, sử dụng để hiển thị phần tiêu đề của ứng dụng.
 <title>{{ env('APP_NAME') }}</title> 

APP_ENV: Môi trường của ứng dụng. Có 4 môi trường của ứng dụng là local, testing, staging, production). Khi chúng ta cấu hình loại môi trường nào, Laravel sẽ tự động thiết lập các thông số liên quan của ứng dụng cho môi trường đó.

APP_KEY: là một dãy ký tự duy nhất, dùng để mã hóa các dữ liệu (session, cookie) cho ứng dụng. Chúng ta có thể dùng lệnh sau để sinh ra APP_KEY:
php artisan key:generate

APP_DEBUG: Nhận 2 giá trị: true hoặc false. Nếu giá trị là true thì ứng dụng ở trạng thái Debug, nghĩa là nếu có lỗi xảy ra thì lỗi cụ thể sẽ được hiển thị ngay trên trang web

4. Routing
-Mục đích và chức năng của routing trong Laravel là định tuyến các Request của người dùng đến một function nào đó, hoặc một đoạn logic xử lý Request của người dùng.

-Tất cả các file route đều được đặt trong thư mục routes/. Khi cài đặt project Laravel mặc định đã có các tệp: - routes/web.php: Định nghĩa các route cho giao diện web của bạn - routes/api.php: Định nghĩa các route cho api.

Các route hỗ trợ các phương thức giao tiếp giữa browser và server thông qua HTTP:

Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);

route xử lý nhiều phương thức với chung một response trả về là match và any:

Route::match(['get', 'post'], '/', function () {
    //
});

Route::any('/', function () {
    //
});

các Route Parameters

Route::get('user/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');

Route::get('user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

Route::get('user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);

Đặt tên:
Route::get('user/profile', function () {
    //
})->name('profile');



5.CSRF Protection

Mỗi khi chúng ta sử dụng bất kỳ một biểu mẫu trỏ đến các tuyến hỗ trợ POST, PUT hoặc DELETE chúng ta đều phải đính kèm một csrf protection trong request gửi lên, nếu không request sẽ bị từ chối.

<form method="POST" action="/profile">
    @csrf
    ...
</form>

6.Namespace 
Namespace giúp tạo ra một không gian tên cho hàm và lớp trong lập trình nói chung và trong PHP-Laravel nói riêng.

Namespace giúp chương trình phân biệt được 2 class có tên trùng nhau.
ví dụ: chúng ta có 2 file mỗi file đều chứa một class và 2 class này lại có một điểm chung là trùng tên. Giờ đây khi bạn nhúng cả 2 file này vào và gọi class thì ngay lập tức chương trình sẽ báo lỗi. Để khắc phục điều đó thì chúng ta cần khai báo namespace cho hai class đó.

Sử dụng: dùng use phía trước đường dẫn ví dụ:
use App\Controllers\Post;

7.Request
Request hiểu một các đơn giản nó là các yêu cầu mà gửi từ client đến server.

Để lấy đối tượng của HTTP request hiện tại thông qua dependency injection ta chỉ cần use Illuminate\Http\Request phần đầu của controller hay type-hint phương thức trong controller, đối tượng của request hiện tại sẽ được tự động inject vào bởi service container.

***Các phương thức hỗ trợ của Request
$request->path()

Phương thức trả về thông tin đường dẫn của request.

$request->is()

Phương thức is() cho phép kiểm tra xem đường dẫn request có khớp với một mẫu hay không, sử dụng ký tự * để trùng khớp tất cả.
ví dụ:

if ($request->is('category/*')) {
    // các đường dẫn bắt đầu bằng category/ được xử lý
    // ví dụ http://localhost:8001/category/create, http://localhost:8001/category/update
}
if ($request->is('category/create')) {
    echo "Đường dẫn bạn vừa truy nhập đúng là http://localhost:8001/category/create {$request->path()}";
}


 $request->url()
Phương thức url() trả về đường dẫn của URL không chứa query string.


$request->fullUrl()

Phương thức này cũng giống như phương thức url() chỉ có điều là nó trả về đẩy đủ URL kể cả query string

$request->method()

Phương thức method() trả về hành động của request là GET hay POST ...

Ngoài ra bạn cũng có thể sử dụng isMethod để xác định hành động có phải là GET, POST ... hay không?

$method = $request->method();
if ($request->isMethod('get')) {
    echo GET request';
} else {
    echo 'POST request';
}

$request->route()->getName()
Phương thức này nếu ta đặt tên cho Route thì nó sẽ trả cho chúng ta name của route đó
// file định nghĩa route: web.php
Route::get('category', 'CategoryController@index')->name('category.index');

//
$nameRoute = $request->route()->getName();
// kết quả là: 'category.index'

$request->ip()

Phương thức này trả về địa chỉ ip của người dùng.

$ipAddress = $request->ip();
echo "Địa chỉ IP người dùng: {$ipAddress}";

$request->server()
Phương thức này trả về các thông tin liên quan đến máy chủ.
Một số thông tin hay được sử dụng:

    REQUEST_TIME: thời gian yêu cầu gửi đến máy chủ web
    QUERY_STRING: query string trong URL
    URL_REFERER: đường dẫn url tham chiếu
    SERVER_ADDR: Địa chỉ máy chủ
    REQUEST_SCHEME: giao thức sử dụng

$request->header()
Phương thức này trả về các thông tin header của request như: thông tin về trình duyệt sử dụng user-agent, thông tin về dữ liệu cookie, trong tin về host yêu cầu ...

 $request->route('<tên route>')

 ***Một số cách lấy thông tin trừ trong Form từ request
 $name = $request->input('email');
 $name = $request->input('email', 'email@gmail.com');

Nhận giá trị input từ JSON
$name = $request->input('categories.name');

Kiểm tra sự tồn tại giá trị của input
if ($request->has('email')) {
    //
}

Nhận tất cả dữ liệu của form
$input = $request->all();

Nhận một phần của dữ liệu input

Khi muốn nhận một phần nhỏ dữ liệu trong form ta có thể sử dụng hàm only hoặc except, 
Cả hai hàm đều nhận một array hoặc một danh sách các đối số:


$input = $request->only(['email', 'password']);

$input = $request->only('email', 'password');

$input = $request->except(['username']);

$input = $request->except('username');


Input cũ trong form

Flash input tới session
$request->flash();

Flash input vào trong session rồi chuyển trang
return redirect('form')->withInput();

return redirect('form')->withInput($request->except('password'));
Lấy dữ liệu cũ
Để lấy dữ liệu đã flash từ request trước đó, ta có thể sử dụng hàm old() cảu request.
$username = $request->old('username');

8.Coockie trong laravel
Tất cả cookie được tạo bởi khuôn khổ Laravel đều được mã hóa và ký bằng mã xác thực, có nghĩa là chúng sẽ bị coi là không hợp lệ nếu chúng đã bị khách hàng thay đổi. Để truy xuất giá trị cookie từ yêu cầu, hãy sử dụng cookie phương thức trên một Illuminate\Http\Request
$value = $request->cookie('name');

Truy cập vào các giá trị của cookie
use Illuminate\Support\Facades\Cookie;
 
$value = Cookie::get('name');

đính kèm Cookies với Responses

return response('Hello World')->cookie(
    'name', 'value', $minutes, $path, $domain, $secure, $httpOnly
);

9. Blade trong laravel 
Không như hầu hết các templating engine khác, Blade không giới hạn bạn trong việc sử dụng mã PHP đơn giản trong View.
Tất cả các Blade View sẽ được biên dịch thành mã PHP và được lưu vào bộ đệm cho đến khi chúng được sửa đổi.
Các file Blade View có phần mở rộng là .blade.php và lưu trong thư mục resources/views.

Kế thừa trong Blade
<!-- Stored in resources/views/layouts/app.blade.php -->

<html>
    <head>
        <title>App Name - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            This is the master sidebar.
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
Kế thừa bố cục

<!-- Stored in resources/views/child.blade.php -->

@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <p>This is my body content.</p>
@endsection

hiển thị dữ liệu các biến trên view

{{ $key }} hoặc {!! $key !!}

