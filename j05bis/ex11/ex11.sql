SELECT UPPER(user_card.last_name) as `NAME`, user_card.first_name, subscription.price
FROM member
INNER JOIN subscription
ON subscription.id_sub = member.id_sub
INNER JOIN user_card
ON member.id_user_card = user_card.id_user
WHERE subscription.price > 42
ORDER BY user_card.last_name ASC, user_card.first_name ASC;
