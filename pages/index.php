<?php

meta(['title' => 'Minimal']);

echo "Hello Denny";
echo ui('alert', ui('ul',
    repeat('li', db::list(new sql\contact()), fn ($x) => $x->name)
));
