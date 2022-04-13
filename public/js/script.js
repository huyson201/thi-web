const btnViewMore = $('.btn-view-more');
const postContent = $('.posts > .row');
let currentPage = 1;

btnViewMore.on('click', async function (e) {
    currentPage++
    let res = await fetch("http://localhost/news2/pagination.php", {
        method: "POST",
        headers:
        {
            "Content-type": "application/json",
            "Accept": "application/json"
        },
        body: JSON.stringify({ page: currentPage, cate: cate })
    })

    let result = await res.json()
    if (result.lastPage) btnViewMore.addClass("hidden");
    result.posts.forEach(post => {
        let card = $(`
                <div class="col-md-4 col-sm-6">
                <aside class="card">
                    <a href="#">
                        <div class="img-box">
                            <img src="./public/images/${post.post_image}" class="card-img-top" alt="image">
                        </div>
                    </a>
                    <div class="card-body">
                        <a href="#">
                            <h5 class="card-title">${post.post_image}</h5>
                        </a>
                        <p class="card-text mb-0">
                            ${post.post_content.substring(0, 150)}...
                        </p>
                        <div class="post-like d-flex align-items-center p-0 m-0">
                            <button class="btn like-btn p-0 m-0 ">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                            </button>
                            <span class="like-number ms-1">1235</span>
                        </div>
                    </div>
                </aside>
    </div>
        `)
        postContent.append(card).masonry("appended", card)
    });
});