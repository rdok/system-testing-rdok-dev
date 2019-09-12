pipeline {
    agent { label "linux" }
    stages {
        stage('test') {
            steps {
                sh 'docker run --rm -v $(pwd):/app -w /app codeception/codeception run codequests_rdok_dev'
                sh 'docker run --rm -v $(pwd):/app -w /app codeception/codeception run jenkins_rdok_dev'
                sh 'docker run --rm -v $(pwd):/app -w /app codeception/codeception run learning_react_rdok_dev'
                sh 'docker run --rm -v $(pwd):/app -w /app codeception/codeception run practical_vim_rdok_dev'
                sh 'docker run --rm -v $(pwd):/app -w /app codeception/codeception run rdok_dev'
            }
        }
    }

    post {                                                                      
        failure {                                                               
            slackSend color: '#FF0000',                                         
                message: "@here Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }                                                                       
        fixed {                                                                 
            slackSend color: 'good',                                            
                message: "@here Fixed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }                                                                       
        success {                                                               
            slackSend message: "Stable: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>" 
        }                                                                       
    } 
        
}
