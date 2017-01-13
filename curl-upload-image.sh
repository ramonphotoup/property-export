curl -k -X POST \
--url 'https://www.reladevel.com/api/v1/object/property_image' \
-H 'content-type: application/json' \
-H 'API-KEY: 9cJTnJyCCUtEoMZaixpC-8g4hL1_9I6W9qKh251_PZo' \
-H 'TOKEN: TzQ_Yzy2I3Y3mMWr79s58hRWunhqVJZbUNKC2JQctsY' \
-d '{
"file": {
 "file": "{data:image/jpg;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAT4+IP/9k=}",
 "filename": "living_room.jpg"},
 "property_reference": 178346,
 "main_image": true,
 "description": "Living Room",
 "date_taken": "1481652884"
}' \
-i
