console.log('hello world');




if (navigator.userAgentData) {
    navigator.userAgentData.getHighEntropyValues(['platform', 'platformVersion', 'architecture', 'model']).then(values => {
      console.log(values.platform); // e.g. "Windows"
      console.log(values.platformVersion); // e.g. "10.0"
      console.log(values.architecture); // e.g. "x64"
      console.log(values.model); // e.g. "PC"
    });
  } else {
    // Fallback to other methods
  }
  