const connection = require('./bd');
const list = require('./list');
const path = require('path');
const { Builder, By, Key, until } = require('selenium-webdriver');
const chrome = require('selenium-webdriver/chrome');

const sleep = (ms) => new Promise(resolve => setTimeout(resolve, ms));

let options = new chrome.Options();
options.addArguments(['start-maximized']);
options.addArguments(`user-data-dir=${path.join(__dirname, 'profile')}`);
options.addArguments(`profile-directory=Default`);

(async function () {
    let text =
        "Добрый день! Интересен готовый сайт по печатям? 111222333.ru. Настроен под Яндекс и Гугл, будут высокие позиции в Вашем городе. Электронная почта для связи: neva-web@mail.ru"

    const queryDatabase = () => {
        return new Promise((resolve, reject) => {
            connection.query('SELECT * FROM users WHERE done = 0 LIMIT 1', (err, results) => { // get only 1 user
                if (err) {
                    console.error('Ошибка выполнения запроса: ' + err.stack);
                    reject(err);
                    return;
                }
                if (results && results.length > 0) {
                    resolve(results[0]); // return user
                } else {
                    resolve(null); // no users
                }
            });
        });
    };

    try {
        // Run until user isn't null
        while (true) {
            const page = await queryDatabase();

            if (!page) {
                console.log("Нет пользователей для обработки или данные не получены.");
                break; // exit if no users
            }

            let driver = await new Builder().forBrowser('chrome').setChromeOptions(options).build();
            await driver.manage().setTimeouts({ implicit: 5000 });

            try {
                await driver.get(page.link);

                let chatButton;
                try {
                    chatButton = await driver.findElement(By.css('a.WorkerControls-Control_chat'));
                } catch (error) {
                    console.log(`Чат не найден на странице ${page.link}. Обновляем пользователя в базе.`);
                    await connection.query(`UPDATE users SET done = 1 WHERE id = ${page.id}`);
                    continue;
                }

                await chatButton.click();

                let frame;
                try {
                    const messenger = await driver.findElement(By.xpath("//div[contains(text(), 'Я.Мессенджер')]"))
                    await messenger.click();
                    frame = await driver.findElement(By.css('iframe.ya-chat-base__iframe'));

                } catch (error) {
                    frame = await driver.findElement(By.css('iframe.ya-chat-base__iframe'));

                }


                await driver.switchTo().frame(frame);

                let textarea = await driver.findElement(By.xpath("//textarea[@placeholder='Сообщение…']"));
                
                await textarea.sendKeys(text);

                await textarea.sendKeys(Key.ENTER);

                await sleep(1000);

                await connection.query(`UPDATE users SET done = 1 WHERE id = ${page.id}`);
                console.log(`Сообщение отправлено для пользователя с id ${page.id}`);

            } catch (innerError) {
                console.error(`Ошибка при обработке пользователя ${page.id}:`, innerError);
            } finally {
                if (driver) {
                    await driver.quit();
                }
            }
        } // end while

    } catch (e) {
        console.error('Ошибка:', e);
    } finally {
        if (connection) {
            connection.end(err => {
                if (err) {
                    console.error("Ошибка закрытия соединения с базой данных:", err);
                } else {
                    console.log("Соединение с базой данных закрыто.");
                }
            });
        }
    }
})();
