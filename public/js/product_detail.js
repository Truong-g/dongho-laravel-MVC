
const bigImg =  document.querySelector('.product__page--img')
const tinyImgs = document.querySelectorAll('.product__page--imgArchrie')
const productLists = document.querySelectorAll('.product__detail--textContainer-items')
const productDetaildBox = document.querySelectorAll('.product__detail--textContainer-show')
const detailListLine =  document.querySelector('.product__detail--textContainer-list .line')
const detailListActive =  document.querySelector('.product__detail--textContainer-items.active')


const selectImg = {
    convertImgUrl: function(n){
        const convertImg = JSON.stringify(bigImg.style.backgroundImage = tinyImgs[n].style.backgroundImage)
        const srcImg = convertImg.slice(convertImg.valueOf('products'), convertImg.length)
        bigImg.style.backgroundImage = srcImg
    },

    starts: function()
    {
        this.convertImgUrl(0);
        tinyImgs.forEach(function(img, i){
            img.onclick = function()
            {
                document.querySelector('.product__page--imgArchrie.active').classList.remove('active')
                this.classList.add('active')
                selectImg.convertImgUrl(i)
            }
        })
    }
}
selectImg.starts();

const handleDetailPd = {

    listDetail: function()
    {
        productLists.forEach(function(item, i)
        {
            const show = productDetaildBox[i]
            item.onclick = function()
            {
                document.querySelector('.product__detail--textContainer-items.active').classList.remove('active')
                document.querySelector('.product__detail--textContainer-show.active').classList.remove('active')
                detailListLine.style.left = this.offsetLeft + 'px'
                detailListLine.style.width = this.offsetWidth + 'px'
                this.classList.add('active')
                show.classList.add('active')
            }
        })
    },

    starts: function()
    {
        detailListLine.style.left = detailListActive.offsetLeft + 'px'
        detailListLine.style.width = detailListActive.offsetWidth + 'px'
        this.listDetail()
    }
}
handleDetailPd.starts()
