pipeline {
    agent { label "linux" }
    triggers { 
        cron('H H(18-19) * * *') 
        upstream(
            upstreamProjects: 'learning-react,practical-vim,rdok.dev',
            threshold: hudson.model.Result.SUCCESS
        )
    }
    options { 
        buildDiscarder(
            logRotator(
                daysToKeepStr: '30',
                numToKeepStr: '100',
                artifactDaysToKeepStr: '30',
                artifactNumToKeepStr: '100'
            )
        )
    }
    stages {
        stage('Build') {
            steps {
                wrap([$class: 'AnsiColorBuildWrapper', 'colorMapName': 'xterm']) {
                    sh 'docker run -i --rm -v $(pwd):/app -w /app codeception/codeception build'
                }
            }
        }
        stage('Test') {
            steps {
                wrap([$class: 'AnsiColorBuildWrapper', 'colorMapName': 'xterm']) {
                    sh 'docker run -i --rm -v $(pwd):/app -w /app codeception/codeception run --html /app/report.html'
                }
            }
        }
    }
    post {                                                                      
        failure {                                                               
            slackSend color: '#FF0000',                                         
            message: "@here Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
            emailext attachLog: true,
            body: """<p>View console output at <a href='${env.BUILD_URL}/console'>
                ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}</a></p>""", 
                compressLog: true,
            recipientProviders: [[$class: 'DevelopersRecipientProvider']],
            subject: "Failed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }                                                                       
        fixed {                                                                 
            slackSend color: 'good',                                            
            message: "@here Fixed: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>"
        }                                                                       
        success {                                                               
            slackSend message: "Stable: <${env.BUILD_URL}console | ${env.JOB_BASE_NAME}#${env.BUILD_NUMBER}>" 
        }                                                                       
        always {
            publishHTML([
            allowMissing: false,
            alwaysLinkToLastBuild: true,
            keepAll: false,
            reportFiles: 'report.html',
            reportName: 'Report',
            reportDir: '.'
            ])
        }
    } 
}
