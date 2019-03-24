pipeline {
    agent any
    stages {
        stage('Test') {
            steps {
                sh './codecept run'
            }
        }
    }
}