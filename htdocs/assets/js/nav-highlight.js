var nav = window.location.pathname

switch (nav)
{
    case '/':
        dashboard = document.getElementById('dashboard')
        dashboard.classList.add('active','bg-gradient-primary')
        break;

    case '/menu':
        menu = document.getElementById('menu')
        menu.classList.add('active', 'bg-gradient-primary')
        break;

     case '/pages':
        pages = document.getElementById('pages')
        pages.classList.add('active', 'bg-gradient-primary')
        console.log('Hello')
        break;

     case '/posts':
        posts = document.getElementById('posts')
        posts.classList.add('active', 'bg-gradient-primary')
        break;
   
    case '/products':
        products = document.getElementById('products')
        products.classList.add('active', 'bg-gradient-primary')
        break;

    case '/profile':
        profile = document.getElementById('profile')
        profile.classList.add('active', 'bg-gradient-primary')
        break;

    default:
        console.log('invalid nav')
        break;

}