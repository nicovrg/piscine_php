(SELECT `last_name` as "NAME", `first_name`, `price`
FROM (user_card INNER JOIN member ON member.id_member = user_card.id_user)
INNER JOIN subscription
ON subscription.id_sub = member.id_sub WHERE subscription.price > 42) ORDER BY `first_name` ASC, `last_name`ASC;