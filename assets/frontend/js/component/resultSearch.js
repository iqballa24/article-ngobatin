const search     = document.getElementById('search');
const resultList = document.getElementById('resultlist');

const resultSearch = result => {
            
    if(result.length > 0) {

        const countResult = result.length;
        const ResultListHTML = result.map(data => `

            <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
                <div class="card card__result">
                    <a href="${data.url}"><img class="card-img-top card__result-img" src="${data.image}" alt="${data.title}"></a>
                    <div class="card-body ">
                        <h5 class="card-title card__result-title">${data.title}</h5>
                        <p class="card-text card__result-text">${data.price}</p>
                        <p><i class="fas fa-store icon__search"></i> ${data.shop}</p>
                        <div class="card__result-star">
                            <div class="row">
                                <div class="col-5">    
                                    <img src="${data.star}" width="16px">
                                    <img src="${data.star}" width="16px">
                                    <img src="${data.star}" width="16px">
                                    <img src="${data.star}" width="16px">
                                    <img src="${data.star}" width="16px">
                                </div>
                                <div class="col-7">
                                    <p>${data.user_buying}</p>
                                </div>
                            </div>
                        </div>
                        <a href="${data.url}" class="button button__primary card__result-button" target="_blank">Kunjungi toko</a>
                        <a href="#" class="button button__secondary card__result-button">Bandingkan Harga</a>
                    </div>
                </div>
            </div>
            
        `).join('');

        resultList.innerHTML = ResultListHTML;
        document.getElementById('count_result').innerHTML = `${countResult} hasil di temukan`;
    }
}

export {resultSearch, search, resultList};