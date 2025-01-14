package script;

import java.util.Random;

import org.openqa.selenium.By;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.chrome.ChromeOptions;

public class AT3 {
	public static String randomStringGenerator() {
		 
	    int leftLimit = 97; // letter 'a'
	    int rightLimit = 122; // letter 'z'
	    int targetStringLength = 10;
	    Random random = new Random();
	    StringBuilder buffer = new StringBuilder(targetStringLength);
	    for (int i = 0; i < targetStringLength; i++) {
	        int randomLimitedInt = leftLimit + (int) 
	          (random.nextFloat() * (rightLimit - leftLimit + 1));
	        buffer.append((char) randomLimitedInt);
	    }
	    String generatedString = buffer.toString();

	    System.out.println(generatedString);
	    return generatedString;
	}
	
	public static void main(String[] args) throws InterruptedException {
		System.setProperty("webdriver.chrome.driver", "C:\\Users\\tanbi\\lib\\chromedriver-win64\\chromedriver.exe");
		ChromeOptions option= new ChromeOptions();
		option.addArguments("--remote-allow-origins");
		ChromeDriver driver= new ChromeDriver(option);
		
		driver.get("http://collaborativemanagementsystemsqa.free.nf");
		Thread.sleep(500);
		driver.findElement(By.name("username")).sendKeys("nouroj");
		driver.findElement(By.name("password")).sendKeys("nouroj@12");
		driver.findElement(By.xpath("//*[@id=\"loginField\"]/div/input[2]")).click();
		Thread.sleep(500);
		driver.get("http://collaborativemanagementsystemsqa.free.nf/view/client/feedback.php");
		String newInput = randomStringGenerator();
		driver.findElement(By.name("country")).sendKeys("Bangladesh");
		driver.findElement(By.name("opinion")).sendKeys(newInput);
		driver.findElement(By.name("feedback")).click();
		Thread.sleep(500);
		driver.get("http://collaborativemanagementsystemsqa.free.nf/view/client/feedbackview.php");
		String newData[] = driver.findElement(By.xpath("(/html/body/div/center/section/table/tbody/tr)[last()]")).getText().split("\\s+");
		
		if (newInput.equals(newData[3])) {
			System.out.print("Success");
		} else {
			System.out.print("Fail");
		}
	}

}

