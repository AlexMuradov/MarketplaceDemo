$(document).ready(function () {
    //create a card template in Catalog list
    function createPage(page){
        return `  
             <li class="card-item" id="card${page.id}">
                <div class="card-top">
                    <div class="card-slider">
                        <div class="slide">
                            <img src="/static/uploads/listings/thumbs/1_885df19487f1372dc3ff2c5062d8274ed9ba7a42.jpg" alt="image room" class="card-img">
                        </div>
                        <div class="slide">
                            <img src="/static/uploads/listings/thumbs/1_885df19487f1372dc3ff2c5062d8274ed9ba7a42.jpg" alt="image room" class="card-img">
                        </div>
                        <div class="slide">
                            <img src="/static/uploads/listings/thumbs/1_885df19487f1372dc3ff2c5062d8274ed9ba7a42.jpg" alt="image room" class="card-img">
                        </div>
                    </div>
                    <div class="card-top__info">
                        <a href="#" class="text-15 c-white">2 комнаты</a>
                        <div class="star">
                            <img src="img/star.svg" alt="star" class="img-star">
                            <span class="text-15">5,0 <span class="c-gray-light"> (98)</span></span>
                        </div>
                    </div>
                </div>
                <div class="card-col">
                    <div class="card-content">
                        ${page.discount}
                        <a href="#" class="text-16">${page.title}</a>
                        <div class="card-info">
                            <div class="card-info__left">
                               ${page.status1}
                               ${page.status2}
                            </div>
                            <p class="c-blue">Всего $180</p>
                        </div>
                        <div class="card-row">
                            <a href="#" class="location">
                                <span class="pin"></span>
                                <p>
                                    <span class="address">${page.name}</span>
                                    0,5 км от центра
                                </p>
                            </a>
                            <div class="price">
                                <span class="c-blue">Всего $180</span>
                                <div class="price-row">
                                    <span class="price-crossed">${page.priceCrossed}</span>
                                    <span class="price-item">${page.price}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label class="card-bottom">
                        <input type="checkbox" class="checkbox">
                        <span><img src="img/lightning.svg" alt="lightning" class="img-lightning"> МГНОВЕННОЕ БРОНИРОВАНИЕ</span>
                        <svg class="instant-reservation">
                            <use xlink:href="img/sprite/sprite.svg#heart"></use>
                        </svg>
                    </label>
                </div>
           </li>
        `
    }

    //draw templates in HTML
    const templates = card.map(page => createPage(page));
    const html = templates.join(' ');
    document.querySelector('#catalog-list').innerHTML = html;

    $(".card-item").mouseover(function () {
        let index = $(this).index();
        $(".my-div-icon").eq(index).addClass('active').siblings().removeClass('active');
    });
    $(".card-item").mouseout(function () {
        $(".my-div-icon").removeClass('active');
    });
});

// info
let card = [
{
    id: 1,
    lat: 40.327427,     // Широта
    lng: 49.819816,    // Долгота
    title:'Просторная и современная квартира в центре города',
    name: 'ул. Зарифа Алиева 28',
    url: 'img/map-pin.svg',
    price: '45$',
    status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
    status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
    discount: '<div class="discount">-10%</div>',
    priceCrossed: '$50',
},

{
    id: 2,
    lat: 40.332010,     // Широта
    lng: 49.828044,    // Долгота
    title:'Просторная и современная квартира в центре города',
    name: 'ул. Зарифа Алиева 28',
    url: 'img/map-pin.svg',
    price: '45$',
    status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
    status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
    discount: '<div class="discount">-10%</div>',
    priceCrossed: '$50',
},

{
    id: 3,
    lat: 40.323552,     // Широта
    lng: 49.833619,    // Долгота
    title:'Просторная и современная квартира в центре города',
    name: 'ул. Зарифа Алиева 28',
    url: 'img/map-pin.svg',
    price: '45$',
    status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
    status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
    discount: '<div class="discount">-10%</div>',
    priceCrossed: '$50',
}

// {
//     id: 4,
//     lat: 40.369511,     // Широта
//     lng: 49.841643,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 5,
//     lat: 40.350376,     // Широта
//     lng: 49.818611,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 6,
//     lat: 40.312919,     // Широта
//     lng: 49.827198,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 7,
//     lat: 40.322331,     // Широта
//     lng: 49.827900,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 8,
//     lat: 40.317781,     // Широта
//     lng: 49.824685,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 9,
//     lat: 40.317862,     // Широта
//     lng: 49.834904,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 10,
//     lat: 40.357664,     // Широта
//     lng: 49.825990,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 11,
//     lat: 40.369961,     // Широта
//     lng: 49.817020,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 12,
//     lat: 40.321180,     // Широта
//     lng: 49.826161,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 13,
//     lat: 40.325098,     // Широта
//     lng: 49.831788,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 14,
//     lat: 40.323793,     // Широта
//     lng: 49.835664,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 15,
//     lat: 40.318317,     // Широта
//     lng: 49.842828,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// }

// {
//     id: 16,
//     lat: 40.354366,     // Широта
//     lng: 49.840607,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 17,
//     lat: 40.361308,     // Широта
//     lng: 49.828951,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 18,
//     lat: 40.338944,     // Широта
//     lng: 49.841449,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 19,
//     lat: 40.351043,     // Широта
//     lng: 49.825137,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 20,
//     lat: 40.367983,     // Широта
//     lng: 49.842600,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 21,
//     lat: 40.357475,     // Широта
//     lng: 49.827974,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 22,
//     lat: 40.333665,     // Широта
//     lng: 49.835097,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 23,
//     lat: 40.322001,     // Широта
//     lng: 49.825399,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 24,
//     lat: 40.355256,     // Широта
//     lng: 49.825880,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 25,
//     lat: 40.370354,     // Широта
//     lng: 49.841008,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 26,
//     lat: 40.359232,     // Широта
//     lng: 49.825210,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 27,
//     lat: 40.333369,     // Широта
//     lng: 49.831932,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 28,
//     lat: 40.338690,     // Широта
//     lng: 49.837909,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 29,
//     lat: 40.327252,     // Широта
//     lng: 49.819037,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 30,
//     lat: 40.322437,     // Широта
//     lng: 49.819835,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 31,
//     lat: 40.337605,     // Широта
//     lng: 49.842892,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 32,
//     lat: 40.358915,     // Широта
//     lng: 49.841206,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 33,
//     lat: 40.338755,     // Широта
//     lng: 49.844563,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 34,
//     lat: 40.329015,     // Широта
//     lng: 49.845016,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 35,
//     lat: 40.328381,     // Широта
//     lng: 49.823334,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 36,
//     lat: 40.369611,     // Широта
//     lng: 49.827009,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 37,
//     lat: 40.360734,     // Широта
//     lng: 49.842068,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 38,
//     lat: 40.364073,     // Широта
//     lng: 49.818343,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 39,
//     lat: 40.353882,     // Широта
//     lng: 49.824705,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 40,
//     lat: 40.362809,     // Широта
//     lng: 49.839142,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 41,
//     lat: 40.322993,     // Широта
//     lng: 49.827261,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 42,
//     lat: 40.334607,     // Широта
//     lng: 49.823890,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 43,
//     lat: 40.336294,     // Широта
//     lng: 49.835473,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 44,
//     lat: 40.334272,     // Широта
//     lng: 49.823142,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 45,
//     lat: 40.348552,     // Широта
//     lng: 49.840671,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 46,
//     lat: 40.359934,     // Широта
//     lng: 49.820306,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 47,
//     lat: 40.339555,     // Широта
//     lng: 49.816682,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 48,
//     lat: 40.338238,     // Широта
//     lng: 49.832539,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 49,
//     lat: 40.348029,     // Широта
//     lng: 49.832778,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 50,
//     lat: 40.340086,     // Широта
//     lng: 49.834270,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 51,
//     lat: 40.367984,     // Широта
//     lng: 49.820150,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 52,
//     lat: 40.330629,     // Широта
//     lng: 49.822008,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 53,
//     lat: 40.364553,     // Широта
//     lng: 49.840761,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 54,
//     lat: 40.336200,     // Широта
//     lng: 49.831834,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 55,
//     lat: 40.312568,     // Широта
//     lng: 49.828113,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 56,
//     lat: 40.356081,     // Широта
//     lng: 49.824258,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 57,
//     lat: 40.360560,     // Широта
//     lng: 49.819804,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 58,
//     lat: 40.360836,     // Широта
//     lng: 49.836108,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 59,
//     lat: 40.332120,     // Широта
//     lng: 49.822412,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 60,
//     lat: 40.365273,     // Широта
//     lng: 49.828029,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 61,
//     lat: 40.317470,     // Широта
//     lng: 49.823113,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 62,
//     lat: 40.349871,     // Широта
//     lng: 49.834086,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 63,
//     lat: 40.351543,     // Широта
//     lng: 49.822204,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 64,
//     lat: 40.321283,     // Широта
//     lng: 49.819704,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 65,
//     lat: 40.314710,     // Широта
//     lng: 49.819191,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 66,
//     lat: 40.313140,     // Широта
//     lng: 49.823038,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 67,
//     lat: 40.344577,     // Широта
//     lng: 49.839413,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 68,
//     lat: 40.346824,     // Широта
//     lng: 49.832251,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 69,
//     lat: 40.345263,     // Широта
//     lng: 49.840679,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 70,
//     lat: 40.313101,     // Широта
//     lng: 49.829949,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 71,
//     lat: 40.323502,     // Широта
//     lng: 49.833684,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 72,
//     lat: 40.358033,     // Широта
//     lng: 49.829833,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 73,
//     lat: 40.354659,     // Широта
//     lng: 49.837690,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 74,
//     lat: 40.362205,     // Широта
//     lng: 49.833279,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 75,
//     lat: 40.371269,     // Широта
//     lng: 49.826909,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 76,
//     lat: 40.343690,     // Широта
//     lng: 49.824981,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 77,
//     lat: 40.332705,     // Широта
//     lng: 49.842347,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 78,
//     lat: 40.339003,     // Широта
//     lng: 49.840439,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 79,
//     lat: 40.321980,     // Широта
//     lng: 49.836881,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 80,
//     lat: 40.355053,     // Широта
//     lng: 49.834729,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 81,
//     lat: 40.341224,     // Широта
//     lng: 49.839378,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 82,
//     lat: 40.345959,     // Широта
//     lng: 49.837258,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 83,
//     lat: 40.342951,     // Широта
//     lng: 49.819155,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 84,
//     lat: 40.321362,     // Широта
//     lng: 49.833227,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 85,
//     lat: 40.315223,     // Широта
//     lng: 49.822870,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 86,
//     lat: 40.320002,     // Широта
//     lng: 49.836530,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 87,
//     lat: 40.328255,     // Широта
//     lng: 49.819134,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 88,
//     lat: 40.314370,     // Широта
//     lng: 49.841780,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 89,
//     lat: 40.338943,     // Широта
//     lng: 49.834899,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 90,
//     lat: 40.363536,     // Широта
//     lng: 49.820019,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 91,
//     lat: 40.357719,     // Широта
//     lng: 49.818143,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 92,
//     lat: 40.368101,     // Широта
//     lng: 49.816700,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 93,
//     lat: 40.359948,     // Широта
//     lng: 49.840190,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 94,
//     lat: 40.364215,     // Широта
//     lng: 49.818452,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 95,
//     lat: 40.369710,     // Широта
//     lng: 49.841384,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 96,
//     lat: 40.369799,     // Широта
//     lng: 49.820072,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 97,
//     lat: 40.321472,     // Широта
//     lng: 49.817003,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 98,
//     lat: 40.331177,     // Широта
//     lng: 49.831799,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 99,
//     lat: 40.328085,     // Широта
//     lng: 49.834526,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 100,
//     lat: 40.369332,     // Широта
//     lng: 49.829339,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 101,
//     lat: 40.322980,     // Широта
//     lng: 49.822915,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 102,
//     lat: 40.341778,     // Широта
//     lng: 49.831625,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 103,
//     lat: 40.366915,     // Широта
//     lng: 49.832010,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 104,
//     lat: 40.354960,     // Широта
//     lng: 49.838545,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 105,
//     lat: 40.339840,     // Широта
//     lng: 49.842053,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 106,
//     lat: 40.369308,     // Широта
//     lng: 49.827586,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 107,
//     lat: 40.364368,     // Широта
//     lng: 49.817000,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 108,
//     lat: 40.326824,     // Широта
//     lng: 49.839063,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 109,
//     lat: 40.315283,     // Широта
//     lng: 49.824238,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 110,
//     lat: 40.368840,     // Широта
//     lng: 49.828174,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 111,
//     lat: 40.335097,     // Широта
//     lng: 49.844536,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 112,
//     lat: 40.371508,     // Широта
//     lng: 49.829155,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 113,
//     lat: 40.324329,     // Широта
//     lng: 49.826162,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 114,
//     lat: 40.333966,     // Широта
//     lng: 49.834519,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 115,
//     lat: 40.322494,     // Широта
//     lng: 49.841537,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 116,
//     lat: 40.321521,     // Широта
//     lng: 49.821656,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 117,
//     lat: 40.346502,     // Широта
//     lng: 49.828038,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 118,
//     lat: 40.315768,     // Широта
//     lng: 49.826364,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 119,
//     lat: 40.348501,     // Широта
//     lng: 49.831289,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 120,
//     lat: 40.319403,     // Широта
//     lng: 49.843326,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 121,
//     lat: 40.322347,     // Широта
//     lng: 49.834986,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 122,
//     lat: 40.355317,     // Широта
//     lng: 49.843637,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 123,
//     lat: 40.316926,     // Широта
//     lng: 49.820515,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 124,
//     lat: 40.344267,     // Широта
//     lng: 49.818545,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 125,
//     lat: 40.339407,     // Широта
//     lng: 49.835900,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 126,
//     lat: 40.356606,     // Широта
//     lng: 49.816576,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 127,
//     lat: 40.313729,     // Широта
//     lng: 49.820015,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 128,
//     lat: 40.364406,     // Широта
//     lng: 49.816667,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 129,
//     lat: 40.353402,     // Широта
//     lng: 49.832437,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 130,
//     lat: 40.329321,     // Широта
//     lng: 49.842899,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 131,
//     lat: 40.343966,     // Широта
//     lng: 49.820338,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 132,
//     lat: 40.334689,     // Широта
//     lng: 49.817651,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 133,
//     lat: 40.358561,     // Широта
//     lng: 49.817563,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 134,
//     lat: 40.363469,     // Широта
//     lng: 49.822085,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 135,
//     lat: 40.326873,     // Широта
//     lng: 49.845829,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 136,
//     lat: 40.370256,     // Широта
//     lng: 49.833003,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 137,
//     lat: 40.328555,     // Широта
//     lng: 49.824445,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 138,
//     lat: 40.330501,     // Широта
//     lng: 49.835553,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 139,
//     lat: 40.359671,     // Широта
//     lng: 49.827004,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 140,
//     lat: 40.325139,     // Широта
//     lng: 49.819118,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 141,
//     lat: 40.326699,     // Широта
//     lng: 49.820459,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 142,
//     lat: 40.332430,     // Широта
//     lng: 49.846102,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 143,
//     lat: 40.360355,     // Широта
//     lng: 49.821848,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 144,
//     lat: 40.341204,     // Широта
//     lng: 49.830164,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 145,
//     lat: 40.335553,     // Широта
//     lng: 49.834307,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 146,
//     lat: 40.339910,     // Широта
//     lng: 49.846174,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 147,
//     lat: 40.357552,     // Широта
//     lng: 49.844316,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 148,
//     lat: 40.325204,     // Широта
//     lng: 49.830850,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 149,
//     lat: 40.341210,     // Широта
//     lng: 49.829002,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 150,
//     lat: 40.362419,     // Широта
//     lng: 49.846379,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 151,
//     lat: 40.351092,     // Широта
//     lng: 49.831067,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 152,
//     lat: 40.321692,     // Широта
//     lng: 49.837738,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 153,
//     lat: 40.368517,     // Широта
//     lng: 49.825568,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 154,
//     lat: 40.327978,     // Широта
//     lng: 49.831196,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 155,
//     lat: 40.320959,     // Широта
//     lng: 49.823388,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 156,
//     lat: 40.322044,     // Широта
//     lng: 49.825086,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 157,
//     lat: 40.332202,     // Широта
//     lng: 49.828891,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 158,
//     lat: 40.366424,     // Широта
//     lng: 49.827467,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 159,
//     lat: 40.358023,     // Широта
//     lng: 49.827826,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 160,
//     lat: 40.341621,     // Широта
//     lng: 49.827006,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 161,
//     lat: 40.318741,     // Широта
//     lng: 49.831194,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 162,
//     lat: 40.344631,     // Широта
//     lng: 49.840132,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 163,
//     lat: 40.370380,     // Широта
//     lng: 49.826163,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 164,
//     lat: 40.364499,     // Широта
//     lng: 49.821862,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 165,
//     lat: 40.353919,     // Широта
//     lng: 49.821067,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 166,
//     lat: 40.357726,     // Широта
//     lng: 49.830222,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 167,
//     lat: 40.337779,     // Широта
//     lng: 49.819538,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 168,
//     lat: 40.347345,     // Широта
//     lng: 49.829963,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 169,
//     lat: 40.345558,     // Широта
//     lng: 49.835776,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 170,
//     lat: 40.323783,     // Широта
//     lng: 49.836925,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 171,
//     lat: 40.318387,     // Широта
//     lng: 49.839949,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 172,
//     lat: 40.336424,     // Широта
//     lng: 49.841784,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 173,
//     lat: 40.347605,     // Широта
//     lng: 49.823528,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 174,
//     lat: 40.336080,     // Широта
//     lng: 49.827252,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 175,
//     lat: 40.369174,     // Широта
//     lng: 49.833251,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 176,
//     lat: 40.367737,     // Широта
//     lng: 49.840115,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 177,
//     lat: 40.365128,     // Широта
//     lng: 49.845685,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 178,
//     lat: 40.366284,     // Широта
//     lng: 49.826757,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 179,
//     lat: 40.335183,     // Широта
//     lng: 49.846162,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 180,
//     lat: 40.333968,     // Широта
//     lng: 49.821724,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 181,
//     lat: 40.359945,     // Широта
//     lng: 49.833293,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 182,
//     lat: 40.357118,     // Широта
//     lng: 49.819032,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 183,
//     lat: 40.353147,     // Широта
//     lng: 49.836319,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 184,
//     lat: 40.346276,     // Широта
//     lng: 49.826307,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 185,
//     lat: 40.342050,     // Широта
//     lng: 49.842863,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 186,
//     lat: 40.345386,     // Широта
//     lng: 49.827415,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 187,
//     lat: 40.332966,     // Широта
//     lng: 49.821182,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 188,
//     lat: 40.350596,     // Широта
//     lng: 49.831058,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 189,
//     lat: 40.319876,     // Широта
//     lng: 49.845986,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 190,
//     lat: 40.333493,     // Широта
//     lng: 49.825881,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 191,
//     lat: 40.364942,     // Широта
//     lng: 49.832334,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 192,
//     lat: 40.361417,     // Широта
//     lng: 49.838200,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 193,
//     lat: 40.313867,     // Широта
//     lng: 49.838197,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 194,
//     lat: 40.338105,     // Широта
//     lng: 49.833819,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 195,
//     lat: 40.360741,     // Широта
//     lng: 49.829530,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 196,
//     lat: 40.336987,     // Широта
//     lng: 49.828658,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 197,
//     lat: 40.366013,     // Широта
//     lng: 49.820593,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 198,
//     lat: 40.317885,     // Широта
//     lng: 49.824953,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 199,
//     lat: 40.344536,     // Широта
//     lng: 49.834290,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 200,
//     lat: 40.348342,     // Широта
//     lng: 49.835862,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 201,
//     lat: 40.331718,     // Широта
//     lng: 49.831009,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 202,
//     lat: 40.362067,     // Широта
//     lng: 49.844940,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 203,
//     lat: 40.319583,     // Широта
//     lng: 49.838515,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 204,
//     lat: 40.332306,     // Широта
//     lng: 49.843350,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 205,
//     lat: 40.325615,     // Широта
//     lng: 49.826519,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 206,
//     lat: 40.358945,     // Широта
//     lng: 49.828804,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 207,
//     lat: 40.328712,     // Широта
//     lng: 49.832463,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 208,
//     lat: 40.352282,     // Широта
//     lng: 49.824786,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 209,
//     lat: 40.360162,     // Широта
//     lng: 49.846226,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 210,
//     lat: 40.344783,     // Широта
//     lng: 49.844226,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 211,
//     lat: 40.355958,     // Широта
//     lng: 49.830185,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 212,
//     lat: 40.353723,     // Широта
//     lng: 49.819191,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 213,
//     lat: 40.336563,     // Широта
//     lng: 49.817092,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 214,
//     lat: 40.364267,     // Широта
//     lng: 49.828174,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 215,
//     lat: 40.361089,     // Широта
//     lng: 49.843720,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 216,
//     lat: 40.359985,     // Широта
//     lng: 49.842252,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 217,
//     lat: 40.368628,     // Широта
//     lng: 49.818119,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 218,
//     lat: 40.333355,     // Широта
//     lng: 49.846315,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 219,
//     lat: 40.360087,     // Широта
//     lng: 49.846086,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 220,
//     lat: 40.345188,     // Широта
//     lng: 49.819397,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 221,
//     lat: 40.356594,     // Широта
//     lng: 49.821700,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 222,
//     lat: 40.363198,     // Широта
//     lng: 49.825667,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 223,
//     lat: 40.333400,     // Широта
//     lng: 49.819974,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 224,
//     lat: 40.352001,     // Широта
//     lng: 49.834206,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 225,
//     lat: 40.325424,     // Широта
//     lng: 49.833971,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 226,
//     lat: 40.326889,     // Широта
//     lng: 49.818809,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 227,
//     lat: 40.332052,     // Широта
//     lng: 49.842338,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 228,
//     lat: 40.340308,     // Широта
//     lng: 49.843038,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 229,
//     lat: 40.337831,     // Широта
//     lng: 49.838891,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 230,
//     lat: 40.322004,     // Широта
//     lng: 49.823838,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 231,
//     lat: 40.348906,     // Широта
//     lng: 49.845867,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 232,
//     lat: 40.368703,     // Широта
//     lng: 49.844225,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 233,
//     lat: 40.334038,     // Широта
//     lng: 49.838018,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 234,
//     lat: 40.328092,     // Широта
//     lng: 49.828732,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 235,
//     lat: 40.331480,     // Широта
//     lng: 49.835563,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 236,
//     lat: 40.350972,     // Широта
//     lng: 49.842731,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 237,
//     lat: 40.342734,     // Широта
//     lng: 49.822866,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 238,
//     lat: 40.332859,     // Широта
//     lng: 49.826785,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 239,
//     lat: 40.361020,     // Широта
//     lng: 49.836978,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 240,
//     lat: 40.361753,     // Широта
//     lng: 49.835177,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 241,
//     lat: 40.333569,     // Широта
//     lng: 49.824577,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 242,
//     lat: 40.368826,     // Широта
//     lng: 49.818946,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 243,
//     lat: 40.326323,     // Широта
//     lng: 49.840063,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 244,
//     lat: 40.360218,     // Широта
//     lng: 49.834613,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 245,
//     lat: 40.351954,     // Широта
//     lng: 49.828338,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 246,
//     lat: 40.322893,     // Широта
//     lng: 49.845544,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 247,
//     lat: 40.339786,     // Широта
//     lng: 49.843295,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 248,
//     lat: 40.347767,     // Широта
//     lng: 49.842204,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 249,
//     lat: 40.355676,     // Широта
//     lng: 49.844592,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 250,
//     lat: 40.364350,     // Широта
//     lng: 49.817560,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 251,
//     lat: 40.349863,     // Широта
//     lng: 49.828662,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 252,
//     lat: 40.359218,     // Широта
//     lng: 49.826661,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 253,
//     lat: 40.365494,     // Широта
//     lng: 49.825308,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 254,
//     lat: 40.336210,     // Широта
//     lng: 49.828927,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 255,
//     lat: 40.345698,     // Широта
//     lng: 49.831500,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 256,
//     lat: 40.342326,     // Широта
//     lng: 49.833622,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 257,
//     lat: 40.337390,     // Широта
//     lng: 49.822710,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 258,
//     lat: 40.363761,     // Широта
//     lng: 49.832715,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 259,
//     lat: 40.348984,     // Широта
//     lng: 49.844988,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 260,
//     lat: 40.327118,     // Широта
//     lng: 49.817181,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 261,
//     lat: 40.334624,     // Широта
//     lng: 49.817813,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 262,
//     lat: 40.362054,     // Широта
//     lng: 49.825388,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 263,
//     lat: 40.326431,     // Широта
//     lng: 49.828253,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 264,
//     lat: 40.344877,     // Широта
//     lng: 49.845783,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 265,
//     lat: 40.313658,     // Широта
//     lng: 49.820458,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 266,
//     lat: 40.354516,     // Широта
//     lng: 49.818262,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 267,
//     lat: 40.347946,     // Широта
//     lng: 49.830458,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 268,
//     lat: 40.323042,     // Широта
//     lng: 49.819963,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 269,
//     lat: 40.324445,     // Широта
//     lng: 49.836036,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 270,
//     lat: 40.344108,     // Широта
//     lng: 49.842852,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 271,
//     lat: 40.332479,     // Широта
//     lng: 49.828728,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 272,
//     lat: 40.316493,     // Широта
//     lng: 49.843225,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 273,
//     lat: 40.355763,     // Широта
//     lng: 49.823734,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 274,
//     lat: 40.346099,     // Широта
//     lng: 49.837472,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 275,
//     lat: 40.335928,     // Широта
//     lng: 49.820534,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 276,
//     lat: 40.353369,     // Широта
//     lng: 49.838983,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 277,
//     lat: 40.316431,     // Широта
//     lng: 49.826852,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 278,
//     lat: 40.344399,     // Широта
//     lng: 49.821640,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 279,
//     lat: 40.357918,     // Широта
//     lng: 49.818562,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 280,
//     lat: 40.356224,     // Широта
//     lng: 49.816573,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 281,
//     lat: 40.345758,     // Широта
//     lng: 49.818771,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 282,
//     lat: 40.367088,     // Широта
//     lng: 49.833007,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 283,
//     lat: 40.312857,     // Широта
//     lng: 49.829911,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 284,
//     lat: 40.363700,     // Широта
//     lng: 49.830978,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 285,
//     lat: 40.365908,     // Широта
//     lng: 49.820876,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 286,
//     lat: 40.357448,     // Широта
//     lng: 49.830542,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 287,
//     lat: 40.318441,     // Широта
//     lng: 49.844555,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 288,
//     lat: 40.330976,     // Широта
//     lng: 49.816790,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 289,
//     lat: 40.363584,     // Широта
//     lng: 49.836293,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 290,
//     lat: 40.317074,     // Широта
//     lng: 49.840179,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 291,
//     lat: 40.332470,     // Широта
//     lng: 49.838759,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 292,
//     lat: 40.361132,     // Широта
//     lng: 49.823863,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 293,
//     lat: 40.334452,     // Широта
//     lng: 49.830839,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 294,
//     lat: 40.352187,     // Широта
//     lng: 49.833975,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 295,
//     lat: 40.371277,     // Широта
//     lng: 49.837720,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 296,
//     lat: 40.333469,     // Широта
//     lng: 49.829475,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 297,
//     lat: 40.340199,     // Широта
//     lng: 49.838761,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 298,
//     lat: 40.365537,     // Широта
//     lng: 49.841059,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// },

// {
//     id: 299,
//     lat: 40.340375,     // Широта
//     lng: 49.841212,    // Долгота
//     title:'Просторная и современная квартира в центре города',
//     name: 'ул. Зарифа Алиева 28',
//     url: 'img/map-pin.svg',
//     price: '45$',
//     status1: ' <p class="card-info__item bg-light-yellow">Опытный владелец</p>',
//     status2: '<p class="card-info__item bg-light-pink">Редкая находка</p>',
//     discount: '<div class="discount">-10%</div>',
//     priceCrossed: '$50',
// }
]

var markerArray = [];

let map = L.map('map', {
    zoom: 14,
    center: [40.386287, 49.862855],
    doubleClickZoom: false,
    scrollWheelZoom: false,
}).locate({setView: true});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

for (let i = 0; i < card.length; i++) {
    let marker = L.marker([card[i].lat, card[i].lng],{icon:myIcon = L.divIcon({
            className: 'my-div-icon',
            html: '<div class="map-pin" id="'+card[i].id+'"><span class="map-price">'+card[i].price+'</span></div>'
        })
    }).addTo(map);
    markerArray.push(marker);
}

var group = new L.featureGroup(markerArray);
map.fitBounds(group.getBounds());

$(document).on('click', '.map-pin', function(e) {
    focusCard($(this).attr('id'));
});

function focusCard(id) {
    var element = document.getElementById("card" + id);
    $(element).addClass('selected').siblings().removeClass('selected');
    var headerOffset = -70;
    var elementPosition = element.getBoundingClientRect().top + window.pageYOffset + headerOffset;
   
    window.scrollTo ({
        top: elementPosition,
        behavior: "smooth"
    });
}

map.on('zoomend', function(e) {
    e.preventDefault();
    console.log(map.getBounds());
    console.log(map.getBounds().getSouthWest().wrap().lat);
    console.log(map.getBounds().getSouthWest().wrap().lng);
    console.log(map.getBounds().getNorthEast().wrap().lat);
    console.log(map.getBounds().getNorthEast().wrap().lng);
});

map.on('moveend', function(e) {
    console.log(map.getBounds());
    console.log(map.getBounds().getSouthWest().wrap().lat);
    console.log(map.getBounds().getSouthWest().wrap().lng);
    console.log(map.getBounds().getNorthEast().wrap().lat);
    console.log(map.getBounds().getNorthEast().wrap().lng);
});

// get all markers on map while drag or zoom
// function getMapMarkers() {
//     var markerList = [];
//     map.eachLayer(function(layer) {
//         if ((layer instanceof L.Marker) && (map.getBounds().contains(layer.getLatLng()))) {
//             var el = htmlToElement(layer.options.icon.options.html);
//             markerList.push($(el).attr('id'));
//         }
//     });
//     console.log(markerList);
// }

// function htmlToElement(html) {
//     var template = document.createElement('template');
//     template.innerHTML = html;
//     return template.content.childNodes;
// }
    
