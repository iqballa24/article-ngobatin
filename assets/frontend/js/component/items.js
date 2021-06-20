function showItems(data) {

    let itemsHTML      = '';
    const itemsElement = document.getElementById('selectedItem');

    data.forEach(items => {
        itemsHTML += `

        <div class="col-lg-3 col-md-4 col-sm-6 mb-5 hidden-box">
            <div class="card card__result mx-auto">
                <a href="${items.url}" target="_blank"><img class="card-img-top card__result-img" src="${items.image}" alt="${items.title}"></a>
                <div class="card-body ">
                    <h5 class="card-title card__result-title">${items.title}</h5>
                    <p class="card-text card__result-text">${items.price}</p>
                    <p><i class="fas fa-store icon__search"></i> ${items.shop}</p>
                    <div class="card__result-star">
                        <div class="row">
                            <div class="col-5">    
                                <img src="${items.star}" width="16px">
                                <img src="${items.star}" width="16px">
                                <img src="${items.star}" width="16px">
                                <img src="${items.star}" width="16px">
                                <img src="${items.star}" width="16px">
                            </div>
                            <div class="col-7">
                                <p>${items.user_buying}</p>
                            </div>
                        </div>
                    </div>
                    <a href="${items.url}" class="button button__primary card__result-button" target="_blank">Kunjungi toko</a>
                    <div class="button-itm">
                        <button class="button button__secondary card__result-button ">Bandingkan Harga</button>
                    </div>
                </div>
            </div>
        </div>
        `
        document.getElementById('spinner').style.display = 'none';
        itemsElement.innerHTML = itemsHTML;
    });
}

export default showItems;