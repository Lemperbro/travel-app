<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div className='fixed z-40 w-full py-4 backdrop-blur-sm bg-black/10'>
        <div className="container">
          <div className='flex justify-between'>
          <img src='/img/logo.png' className='w-22 h-14 my-auto '/>
              <ul className='flex gap-x-8 my-auto'>
                <li className='list-none text-white text-lg font-bold cursor-pointer'><a href="/">Home</a> </li>
                <li className='list-none text-white text-lg font-bold cursor-pointer'></li>
                <li className='list-none text-white text-lg font-bold cursor-pointer'><a href='/destination'>Booking</a></li>
              </ul>
              <div className="flex gap-x-2">
                <a href="masuk" className='bg-dark p-2 rounded-md text-white inline-block my-auto'>Login</a>
                <a href="daftar" className='bg-dark p-2 rounded-md text-white inline-block my-auto'>Register</a>
                </div>   
          </div>
          </div>
      </div>
</body>
</html>