function findGame(name) {
    GamesWalker.clear();
    GamesWalker.getGames({name_en: name});
}

