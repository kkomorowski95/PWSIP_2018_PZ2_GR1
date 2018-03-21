/* Sumuje wszystkie karty z decku */

SELECT Deck_card.Deck_ID, Card.name, COUNT( Deck_card.Card_ID )
FROM Deck_card, Card
GROUP BY Deck_card.Card_ID, Card.id
HAVING Deck_card.Card_ID = Card.id

/* Wyświetla nazwy wylosowanych kart oraz ich kolejność od góry do dołu talii (można dodać do klauzuli WHERE Card_drawn.ID = *cyfra* żeby wybrać konkretny deck */

SELECT Deck_drawn.Slot, Card.name
FROM Deck_drawn, Card
WHERE Deck_drawn.CardObject_ID = Card.id

/* Czyszczenie */
DELETE FROM Deck_drawn WHERE ID != 0;
DELETE FROM Player_hand WHERE ID != 0;