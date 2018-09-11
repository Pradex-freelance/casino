const games_on_page = 12;

var GamesWalker = {

    games: null,
    games_list_selector: "#slot-list",

    current_num: 0,

    last_id: function () {
        return this.games[this.games.length-1].id;
    },

    getGames:  function (parameters) {

        let params;

        if (parameters == null)
        {
            params = this.parameters;
        }
        else{
            params = parameters;
        }

        params.action = 'get_games_ajax';

        $.post(
            "/ajax",
            params,
            function (data) {
                GamesWalker.games = JSON.parse(data);
                GamesWalker.walk();
            }
        )
    },

    parameters: {

    },

    walk: function (count) {

        if (this.games.length === 0 ){
            $('.msgbox-error').hide();
            $('.msgbox-error').text('Игры не найдены').fadeIn(500);
        }
        else{
            $('.msgbox-error').hide();
        }

        if (count === undefined){count = games_on_page}

        let finish = this.current_num+count;

        if(finish>this.games.length){
            finish=this.games.length;
        }

        for (; this.current_num<finish; this.current_num++){
            let slot = $('.slot-blank').first().clone().removeClass('slot-blank').addClass('slot');
            slot.prop('href', this.games[this.current_num].url_sites);
            $('img', slot).prop('src', this.games[this.current_num].url_images);
            $('span', slot).text(this.games[this.current_num].name_en);
            if(this.games[this.current_num].new === "1"){
                $('.new-games', slot).show();
            }
            slot.appendTo(this.games_list_selector).fadeIn(500);
        }

        if (finish>=this.games.length){
            $('a', '#more').hide();
        }
        else{
            $('a', '#more').show();
        }
    },

    clear: function () {
        $('.slot', this.games_list_selector).remove();
        this.current_num = 0;
    }
};

$(document).ready(function () {

    let s = $('select','#provider-select');
    s.change(function() {
        GamesWalker.clear();
        GamesWalker.getGames({breeder: s.val()});
    });
});

function findGame(name) {
    GamesWalker.clear();
    GamesWalker.getGames({name_en: name});
}

GamesWalker.getGames();

document.onkeyup = function (e) {
    e = e || window.event;

    if (e.key === 'Enter'){
        $('button', '#game-search').click();
    }
};
